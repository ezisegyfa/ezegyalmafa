<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Order;
use App\Models\Transport;
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
        $transports = Transport::with('getorder','getuser')->paginate(25);
        $orders = Order::with('getbuyer','getproducttype','getuser','getsettlement','getcar','getdriver')->paginate(25);

        return view('transports.index', compact('transports', 'orders'));
    }

    /**
     * Show the form for creating a new transport.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $getOrders = $this->getOrderIdentifiers();
        $getUsers = User::pluck('email','id')->all();
        
        return view('transports.create', compact('getOrders','getUsers'));
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
            
            Transport::create($data);

            return redirect()->route('transports.transport.index')
                             ->with('success_message', 'Transport was successfully added!');

        } catch (Exception $exception) {
            dd($exception->getMessage());
            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    public function completeOrder($id)
    {
        $orderToComplete = Order::findOrFail($id);
        $newTransportRawData = [
            'quantity' => $orderToComplete->quantity,
            'order' => $orderToComplete->id,
            'uploader' => Auth::user()->id,
        ];
        Transport::create($newTransportRawData);
        return redirect()->route('transports.transport.index')
                             ->with('success_message', 'Transport was successfully added!');
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
        $transport = Transport::with('getorder','getuser')->findOrFail($id);

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
        $getOrders = $this->getOrderIdentifiers();
$getUsers = User::pluck('email','id')->all();

        return view('transports.edit', compact('transport','getOrders','getUsers'));
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

    public function getOrderIdentifiers()
    {
        $orderIdentifiers = array();
        collect(Order::all())->each(function($order, $key) use(&$orderIdentifiers){ 
            $orderIdentifiers[$order->id] = $order->getIdenitifier();
        });
        return $orderIdentifiers;
    }
}
