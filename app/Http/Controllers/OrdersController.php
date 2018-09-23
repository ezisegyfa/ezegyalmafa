<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use App\User;
use App\Models\Order;
use App\Models\Buyer;
use App\Models\Settlement;
use App\Models\ProductType;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrdersFormRequest;
use Illuminate\Support\Facades\Cookie;
use Auth;
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
        $columnNames = Order::getColumnNames();

        return view('orders.index', compact('columnNames'));
    }

    public function getQuery()
    {
        return Order::getDataTableQuery();
    }

    public function getUncomplitedQuery()
    {
        return Order::getDataTableQuery(Order::getUncomplitedOrdersQuery());
    }

    public function getByBuyerQuery($buyerId)
    {
        return Order::getDataTableQuery(Order::where('buyer', $buyerId));
    }

    /**
     * Show the form for creating a new order.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $getBuyers = getRenderValues("Buyer");
$getProductTypes = getRenderValues("ProductType");
$getUploaders = getRenderValues("User");
$getSettlements = getRenderValues("Settlement");
        
        return view('orders.create', compact('getBuyers','getProductTypes','getUploaders','getSettlements'));
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
            $data['uploader'] = Auth::user()->id;
            
            Order::create($data);

            return redirect()->route('orders.order.index')
                             ->with('success_message', 'Order was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    public function createWithBuyer()
    {
        $getProductTypes = ProductType::pluck('name','id')->all();
        $getCities = City::pluck('name','id')->all();
        $getIdentityCardSeries = IdentityCardSeries::pluck('name','id')->all();
        $getIdentityCardTypes = IdentityCardType::pluck('name','id')->all();
        $storedData = json_decode(Cookie::get('buyer'));

        return view('orders.createWithBuyerForm', compact('getProductTypes', 'getCities', 'getIdentityCardSeries', 'getIdentityCardTypes', 'storedData'));
    }

    public function storeWithBuyer(Request $request)
    {
        $request->validate([
            'buyer.first_name' => 'required|string|min:1|max:255',
            'buyer.last_name' => 'required|string|min:1|max:255',
            'buyer.email' => 'nullable|string|min:0|max:255',
            'buyer.phone_number' => 'required|numeric|string|min:1',
            'buyer.adress' => 'required',
            'buyer.cnp' => 'required|string|min:1|max:10',
            'buyer.seria_nr' => 'required|string|min:1|max:10',
            'buyer.city' => 'required',
            'buyer.seria' => 'required',
            'buyer.identity_card_type' => 'required',
            'quantity' => 'required|numeric|min:-2147483648|max:2147483647',
            'product_type' => 'required',
        ]);

        $data = $request->all();
        $buyer = Buyer::firstOrCreate($data['buyer'], ['cnp' => $data['buyer']['cnp']]);
        $data['buyer'] = $buyer->id;
        Order::create($data);

        $response = redirect()->route('orders.order.index')
                         ->with('success_message', 'Order was successfully added!');
        if (array_key_exists('remember_me', $data))
            $response = $response->withCookie(Cookie::forever('buyer', json_encode($data['buyer'])));
        return $response;
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
        $order = Order::with('getbuyer','getproducttype','getUploader','getsettlement')->findOrFail($id);

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
        $getBuyers = getRenderValues("Buyer");
$getProductTypes = getRenderValues("ProductType");
$getUploaders = getRenderValues("User");
$getSettlements = getRenderValues("Settlement");

        return view('orders.edit', compact('order','getBuyers','getProductTypes','getUploaders','getSettlements'));
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
