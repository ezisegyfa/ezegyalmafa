<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use App\User;
use App\Models\ProductType;
use App\Models\StockTransport;
use App\Http\Controllers\Controller;
use App\Http\Requests\StockTransportsFormRequest;
use Auth;
use Exception;

class StockTransportsController extends Controller
{

    /**
     * Display a listing of the stock transports.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $columnNames = StockTransport::getColumnNames();

        return view('stock_transports.index', compact('columnNames'));
    }

    public function getQuery()
    {
        return StockTransport::getDataTableQuery();
    }

    /**
     * Show the form for creating a new stock transport.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $getProductTypes = getRenderValues("ProductType");
$getUploaders = getRenderValues("User");
        
        return view('stock_transports.create', compact('getProductTypes','getUploaders'));
    }

    /**
     * Store a new stock transport in the storage.
     *
     * @param App\Http\Requests\StockTransportsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(StockTransportsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $data['uploader'] = Auth::user()->id;
            
            StockTransport::create($data);

            return redirect()->route('stock_transports.stock_transport.index')
                             ->with('success_message', 'Stock Transport was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified stock transport.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $stockTransport = StockTransport::with('getproducttype','getUploader')->findOrFail($id);

        return view('stock_transports.show', compact('stockTransport'));
    }

    /**
     * Show the form for editing the specified stock transport.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $stockTransport = StockTransport::findOrFail($id);
        $getProductTypes = getRenderValues("ProductType");
$getUploaders = getRenderValues("User");

        return view('stock_transports.edit', compact('stockTransport','getProductTypes','getUploaders'));
    }

    /**
     * Update the specified stock transport in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\StockTransportsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, StockTransportsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $stockTransport = StockTransport::findOrFail($id);
            $stockTransport->update($data);

            return redirect()->route('stock_transports.stock_transport.index')
                             ->with('success_message', 'Stock Transport was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified stock transport from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $stockTransport = StockTransport::findOrFail($id);
            $stockTransport->delete();

            return redirect()->route('stock_transports.stock_transport.index')
                             ->with('success_message', 'Stock Transport was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
