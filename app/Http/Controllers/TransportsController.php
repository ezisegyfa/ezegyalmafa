<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use App\Models\Car;
use App\User;
use App\Models\Order;
use App\Models\Driver;
use App\Models\Transport;
use App\Models\StockTransport;
use App\Http\Controllers\Controller;
use App\Http\Requests\TransportsFormRequest;
use Auth;
use Exception;

class TransportsController extends Controller
{

    /**
     * Display a listing of the transports.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        Order::getUncomplitedOrdersQuery()->get();
        $transportColumnNames = Transport::getColumnNames();
        $orderColumnNames = Order::getColumnNames();

        return view('transports.index', compact('transportColumnNames', 'orderColumnNames'));
    }

    public function getQuery()
    {
        return Transport::getDataTableQuery();
    }

    public function getByDriverQuery()
    {
        return Transport::getDataTableQuery(Transport::where('driver'));
    }

    /**
     * Show the form for creating a new transport.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $getOrders = getRenderValues("Order");
$getUploaders = getRenderValues("User");
$getCars = getRenderValues("Car");
$getDrivers = getRenderValues("Driver");
$getStockTransports = getRenderValues("StockTransport");
        
        return view('transports.create', compact('getOrders','getUploaders','getCars','getDrivers','getStockTransports'));
    }

    /**
     * Show the form for creating a new transport.
     *
     * @return Illuminate\View\View
     */
    public function createByOrder($orderId)
    {
        $order = $orderId;
        $getOrders = getRenderValues("Order");
$getUploaders = getRenderValues("User");
$getCars = getRenderValues("Car");
$getDrivers = getRenderValues("Driver");
$getStockTransports = getRenderValues("StockTransport");
        
        return view('transports.create', compact('getOrders','getUploaders','getCars','getDrivers','getStockTransports', 'order'));
    }

    /**
     * Store a new transport in the storage.
     *
     * @param App\Http\Requests\TransportsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(TransportsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $data['uploader'] = Auth::user()->id;
            
            Transport::create($data);

            return redirect()->route('transports.transport.index')
                             ->with('success_message', 'Transport was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified transport.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $transport = Transport::with('getorder','getUploader','getcar','getdriver','getstocktransport')->findOrFail($id);

        return view('transports.show', compact('transport'));
    }

    /**
     * Show the form for editing the specified transport.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $transport = Transport::findOrFail($id);
        $getOrders = getRenderValues("Order");
$getUploaders = getRenderValues("User");
$getCars = getRenderValues("Car");
$getDrivers = getRenderValues("Driver");
$getStockTransports = getRenderValues("StockTransport");

        return view('transports.edit', compact('transport','getOrders','getUploaders','getCars','getDrivers','getStockTransports'));
    }

    /**
     * Update the specified transport in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\TransportsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, TransportsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $transport = Transport::findOrFail($id);
            $transport->update($data);

            return redirect()->route('transports.transport.index')
                             ->with('success_message', 'Transport was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified transport from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $transport = Transport::findOrFail($id);
            $transport->delete();

            return redirect()->route('transports.transport.index')
                             ->with('success_message', 'Transport was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
