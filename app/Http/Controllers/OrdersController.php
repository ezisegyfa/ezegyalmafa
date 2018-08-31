<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Buyer;
use App\Models\ProductType;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrdersFormRequest;
use Illuminate\Http\Request;
use Exception;

class OrdersController extends Controller
{

    /**
     * Display a listing of the orders.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $orders = Order::with('getbuyer','getproducttype')->paginate(25);

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new order.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $getBuyers = Buyer::pluck('first_name','id')->all();
        $getProductTypes = ProductType::pluck('name','id')->all();
        
        return view('orders.create', compact('getBuyers','getProductTypes'));
    }

    /**
     * Store a new order in the storage.
     *
     * @param App\Http\Requests\OrdersFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(OrdersFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Order::create($data);

            return redirect()->route('orders.order.index')
                             ->with('success_message', 'Order was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    public function storeWithBuyer(Request $request)
    {
        try {

            $request->validate([
                'buyer.first_name' => 'required|string|min:1|max:255',
                'buyer.last_name' => 'required|string|min:1|max:255',
                'buyer.email' => 'nullable|string|min:0|max:255',
                'buyer.phone_number' => 'required|numeric|string|min:1|max:15',
                'buyer.adress' => 'required',
                'buyer.cnp' => 'required|string|min:1|max:10',
                'buyer.seria_nr' => 'required|string|min:1|max:10',
                'buyer.city' => 'required',
                'buyer.seria' => 'required',
                'buyer.identity_card_type' => 'required',
                'quantity' => 'required|numeric|min:-2147483648|max:2147483647',
                'product_type' => 'required',
            ]);
            
            $data = $request->getData();
            

            $buyer = Buyer::firstOrCreate($data->buyer);
            $data->order->buyer = $buyer->id;
            Order::create($data->order);

            return redirect()->route('orders.order.index')
                             ->with('success_message', 'Order was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified order.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $order = Order::with('getbuyer','getproducttype')->findOrFail($id);

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified order.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $getBuyers = Buyer::pluck('first_name','id')->all();
        $getProductTypes = ProductType::pluck('name','id')->all();

        return view('orders.edit', compact('order','getBuyers','getProductTypes'));
    }

    /**
     * Update the specified order in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\OrdersFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, OrdersFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $order = Order::findOrFail($id);
            $order->update($data);

            return redirect()->route('orders.order.index')
                             ->with('success_message', 'Order was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified order from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->delete();

            return redirect()->route('orders.order.index')
                             ->with('success_message', 'Order was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
