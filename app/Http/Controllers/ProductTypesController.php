<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use App\Models\ProductType;
use App\Models\ProcessType;
use App\Models\MaterialType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductTypesFormRequest;
use Exception;

class ProductTypesController extends Controller
{

    /**
     * Display a listing of the product types.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $columnNames = ProductType::getColumnNames();

        return view('product_types.index', compact('columnNames'));
    }

    public function getQuery()
    {
        return ProductType::getDataTableQuery();
    }

    /**
     * Show the form for creating a new product type.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $getMaterialTypes = getRenderValues("MaterialType");
$getProcessTypes = getRenderValues("ProcessType");
        
        return view('product_types.create', compact('getMaterialTypes','getProcessTypes'));
    }

    /**
     * Store a new product type in the storage.
     *
     * @param App\Http\Requests\ProductTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(ProductTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            ProductType::create($data);

            return redirect()->route('product_types.product_type.index')
                             ->with('success_message', 'Product Type was successfully added!');

        } catch (Exception $exception) {
            dd($exception->getMessage());
            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified product type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $productType = ProductType::with('getmaterialtype','getprocesstype')->findOrFail($id);

        return view('product_types.show', compact('productType'));
    }

    /**
     * Show the form for editing the specified product type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $productType = ProductType::findOrFail($id);
        $getMaterialTypes = getRenderValues("MaterialType");
$getProcessTypes = getRenderValues("ProcessType");

        return view('product_types.edit', compact('productType','getMaterialTypes','getProcessTypes'));
    }

    /**
     * Update the specified product type in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\ProductTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, ProductTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $productType = ProductType::findOrFail($id);
            $productType->update($data);

            return redirect()->route('product_types.product_type.index')
                             ->with('success_message', 'Product Type was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified product type from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $productType = ProductType::findOrFail($id);
            $productType->delete();

            return redirect()->route('product_types.product_type.index')
                             ->with('success_message', 'Product Type was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
