<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $transports = Transport::with('getorder')->paginate(25);

        return view('transports.index', compact('transports'));
    }

    /**
     * Show the form for creating a new transport.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $getOrders = Order::pluck('quantity','id')->all();
        
        return view('transports.create', compact('getOrders'));
    }

    /**
     * Store a new transport in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
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
        $transport = Transport::with('getorder')->findOrFail($id);

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
        $getOrders = Order::pluck('quantity','id')->all();

        return view('transports.edit', compact('transport','getOrders'));
    }

    /**
     * Update the specified transport in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
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

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'quantity' => 'required|numeric|min:-2147483648|max:2147483647',
            'order' => 'required',
     
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
