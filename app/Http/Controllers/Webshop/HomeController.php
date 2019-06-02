<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use App\Models\Buyer;
use App\Models\Region;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productTypes = ProductType::with('productTypeImages.image')->paginate(16);
        return view('webshop.productList', compact('productTypes'));
    }

    public function search(Request $request)
    {
        $searchedText = $request->get('searched_text');

        $searchQuery = ProductType::with('productTypeImages.image');
        
        $this->textSearch($searchQuery, $request, $searchedText);
        $this->categorySearch($searchQuery, $request, $searchedText);
        $this->specialitiesSearch($searchQuery, $request, $searchedText);
        $this->brandSearch($searchQuery, $request, $searchedText);
        
        $productTypes = $searchQuery->paginate(16);
        $request->flash();
        return view('webshop.productList', compact('productTypes'));
    }

    public function textSearch($searchQuery, $request, $searchedText = '')
    {
        $searchQuery->where(function($query) use($request, $searchedText) {
            if (!empty($searchedText)) {
                $query->whereRaw('name LIKE "%' . $searchedText . '%" OR code LIKE "%' . $searchedText . '%"');
                if (empty($request->get('category_id'))) {
                    $query->orWhereExists(function ($subQuery) use($searchedText) {
                        $subQuery->select(\DB::raw(1))
                            ->from('product_categories')
                            ->whereRaw('product_categories.id = product_types.category_id')
                            ->whereRaw('product_categories.name LIKE "%' . $searchedText . '%"');
                    });
                }
                if (empty($request->get('product_speciality'))) {
                    $query->orWhereExists(function ($subQuery) use($searchedText) {
                        $subQuery->select(\DB::raw(1))
                            ->from('product_specialities')
                            ->join('product_type_specialities', 'product_type_specialities.product_speciality_id', 'product_specialities.id')
                            ->whereRaw('product_types.id = product_type_specialities.product_type_id')
                            ->whereRaw('product_specialities.name LIKE "%' . $searchedText . '%"');
                    });
                }
                if (empty($request->get('brand'))) {
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

    public function categorySearch($searchQuery, $request, $searchedText = '')
    {
        $searchedCategory = $request->get('category_id');
        if (!empty($searchedCategory)) 
            $searchQuery->where('category_id', $searchedCategory);
    }

    public function specialitiesSearch($searchQuery, $request, $searchedText = '')
    {
        $searchedSpeciality = $request->get('product_speciality');
        if (!empty($searchedSpeciality)) {
            $searchQuery->whereExists(function ($query) use($searchedSpeciality) {
                $query->select(\DB::raw(1))
                    ->from('product_specialities')
                    ->join('product_type_specialities', 'product_type_specialities.product_speciality_id', 'product_specialities.id')
                    ->whereRaw('product_types.id = product_type_specialities.product_type_id')
                    ->whereRaw('product_specialities.id = ' . $searchedSpeciality);
            });
        }
    }

    public function brandSearch($searchQuery, $request, $searchedText = '')
    {
        $searchedBrand = $request->get('brand');
        if (!empty($searchedBrand)) 
            $searchQuery->whereExists(function ($query) use($searchedBrand) {
                $query->select(\DB::raw(1))
                    ->from('brands')
                    ->join('product_type_brands', 'product_type_brands.brand_id', 'brands.id')
                    ->whereRaw('product_types.id = product_type_brands.product_type_id')
                    ->whereRaw('brands.id = ' . $searchedBrand);
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

    public function storeOutputOrder()
    {
        return redirect('');
    }

    public function downloadCatalogPdf()
    {
        return response()->download(storage_path('protectorate katalogus.pdf'));
    }
}
