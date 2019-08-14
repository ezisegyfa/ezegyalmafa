<?php

namespace App\Http\Controllers\Webshop;

use App\Models\ProductType;
use App\Models\Buyer;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searchData = Input::get();
        if (array_key_exists('searched_text', $searchData))
            $searchedText = $searchData['searched_text'];
        else
            $searchedText = '';

        $searchQuery = ProductType::with('productTypeImages.image');
        
        $this->textSearch($searchQuery, $searchData, $searchedText);
        $this->categorySearch($searchQuery, $searchData, $searchedText);
        $this->specialitiesSearch($searchQuery, $searchData, $searchedText);
        $this->brandSearch($searchQuery, $searchData, $searchedText);
        
        $productTypes = $searchQuery->paginate(16);
        request()->flash();
        return view('webshop.productList', compact('productTypes'));
    }

    public function textSearch($searchQuery, $searchData, $searchedText = '')
    {
        $searchQuery->where(function($query) use($searchData, $searchedText) {
            if (!empty($searchedText)) {
                $query->whereRaw('name LIKE "%' . $searchedText . '%" OR code LIKE "%' . $searchedText . '%"');
                if (empty($searchData['category_id'])) {
                    $query->orWhereExists(function ($subQuery) use($searchedText) {
                        $subQuery->select(\DB::raw(1))
                            ->from('product_categories')
                            ->whereRaw('product_categories.id = product_types.category_id')
                            ->whereRaw('product_categories.name LIKE "%' . $searchedText . '%"');
                    });
                }
                if (empty($searchData['product_speciality'])) {
                    $query->orWhereExists(function ($subQuery) use($searchedText) {
                        $subQuery->select(\DB::raw(1))
                            ->from('product_specialities')
                            ->join('product_type_specialities', 'product_type_specialities.product_speciality_id', 'product_specialities.id')
                            ->whereRaw('product_types.id = product_type_specialities.product_type_id')
                            ->whereRaw('product_specialities.name LIKE "%' . $searchedText . '%"');
                    });
                }
                $query->orWhereExists(function ($subQuery) use($searchedText) {
                    $subQuery->select(\DB::raw(1))
                        ->from('product_type_properties')
                        ->whereRaw('product_types.id = product_type_properties.product_type_id')
                        ->whereRaw('product_type_properties.name LIKE "%' . $searchedText . '%"');
                });
                if (empty($searchData['brand'])) {
                    $query->orWhereExists(function ($subQuery) use($searchedText) {
                        $subQuery->select(\DB::raw(1))
                            ->from('brands')
                            ->join('product_type_brands', 'product_type_brands.brand_id', 'brands.id')
                            ->whereRaw('product_types.id = product_type_brands.product_type_id')
                            ->whereRaw('brands.name LIKE "%' . $searchedText . '%"');
                    });
                }
            }
        });
    }

    public function categorySearch($searchQuery, $searchData, $searchedText = '')
    {
        if (!empty($searchData['category_id'])) 
            $searchQuery->where('category_id', $searchData['category_id']);
    }

    public function specialitiesSearch($searchQuery, $searchData, $searchedText = '')
    {
        if (!empty($searchData['product_speciality'])) {
            $searchQuery->whereExists(function ($query) use($searchData) {
                $query->select(\DB::raw(1))
                    ->from('product_specialities')
                    ->join('product_type_specialities', 'product_type_specialities.product_speciality_id', 'product_specialities.id')
                    ->whereRaw('product_types.id = product_type_specialities.product_type_id')
                    ->whereRaw('product_specialities.id = ' . $searchData['product_speciality']);
            });
        }
    }

    public function brandSearch($searchQuery, $searchData, $searchedText = '')
    {
        if (!empty($searchData['brand'])) 
            $searchQuery->whereExists(function ($query) use($searchData) {
                $query->select(\DB::raw(1))
                    ->from('brands')
                    ->join('product_type_brands', 'product_type_brands.brand_id', 'brands.id')
                    ->whereRaw('product_types.id = product_type_brands.product_type_id')
                    ->whereRaw('brands.id = ' . $searchData['brand']);
            });
    }

    public function showProductDetails(int $productTypeId)
    {
        $productType = ProductType::with('productTypeProperties', 'productTypeSpecialities.productSpeciality')->findOrFail($productTypeId);
        $regionOptions = Region::select('id', 'name')->get()->map(function($region) {
            $regionOption = new \stdClass;
            $regionOption->value = $region->id;
            $regionOption->label = $region->name;
            return $regionOption;
        });
        $user = \Auth::user();
        if (!empty($user) && isset($user->settlement) && !empty($user->settlement)) 
            $locationOptions = $user->settlement->region->settlements->map(function($location) {
                $locationOption = new \stdClass;
                $locationOption->value = $location->id;
                $locationOption->label = $location->name;
                return $locationOption;
            });
        else
            $locationOptions = [];
        return view('webshop.productDetails', compact('productType', 'regionOptions', 'locationOptions'));
    }

    public function showTermsAndConditions()
    {
        return view('termsAndConditions');
    }

    public function showPrivateDataProtectionDescription()
    {
        return view('privateDataProtectionDescription');
    }

    public function showOutputOrderForm()
    {
        //dd(Buyer::getFormInfos());
        $formInfos = Buyer::getFormInfos();
        return view('webshop.orderForm', compact('formInfos'));
    }

    public function downloadCatalogPdf()
    {
        return response()->download(storage_path('protectorate katalogus.pdf'));
    }
}
