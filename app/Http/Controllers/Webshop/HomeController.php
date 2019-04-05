<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use App\Models\Buyer;
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
        $productTypes = ProductType::with('_productTypeImages._image')->paginate(16);
        return view('webshop.productList', compact('productTypes'));
    }

    public function showProductDetails(int $productTypeId)
    {
        $productType = ProductType::with('_productTypeProperties', '_productTypeSpecialities._productSpeciality')->findOrFail($productTypeId);
        return view('webshop.productDetails', compact('productType'));
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
