<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productTypes = ProductType::with('_productTypeImages._image')->paginate();
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
}