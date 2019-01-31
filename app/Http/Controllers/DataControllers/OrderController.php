<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Buyer;
use App\Http\Controllers\Crm\CrmController;
use Illuminate\Support\Facades\Cookie;

class OrderController extends CrmController
{
    public function getUncomplitedQuery()
    {
        return Order::getDataTableQuery(Order::getUncomplitedOrdersQuery());
    }

    public function getByBuyerQuery($buyerId)
    {
        return Order::getDataTableQuery(Order::where('buyer', $buyerId));
    }

    public function createWithBuyer($productTypeId)
    {
        $product_type = $productTypeId;
        $getProductTypes = getRenderValues("ProductType");
        $getSettlements = getRenderValues("Settlement");
        $getIdentityCardSeries = getRenderValues("IdentityCardSeries");
        $getIdentityCardTypes = getRenderValues("IdentityCardType");
        $getNotificationTypes = getRenderValues("NotificationType");
        $storedData = json_decode(Cookie::get('buyer'));

        return view('orders.createWithBuyer', compact('getProductTypes', 'getSettlements', 'getIdentityCardSeries', 'getIdentityCardTypes', 'getNotificationTypes', 'storedData', 'product_type'));
    }

    public function storeWithBuyer(Request $request)
    {
        $request->validate([
            'buyer.first_name' => 'required|string|min:1|max:255',
            'buyer.last_name' => 'required|string|min:1|max:255',
            'buyer.email' => 'nullable|string|min:0|max:255',
            'buyer.phone_number' => 'required|numeric|string|digits:10',
            'buyer.adress' => 'required',
            'buyer.cnp' => 'required|string|numeric|digits:13',
            'buyer.identity_seria_nr' => 'required|string|numeric|digits:6',
            'buyer.settlement' => 'required',
            'buyer.identity_seria_type' => 'required',
            'buyer.identity_card_type' => 'required',
            'order.quantity' => 'required|numeric|min:-2147483648|max:2147483647',
            'order.product_type' => 'required',
            'order.settlement' => 'required',
            'order.address' => 'required|string'
        ]);

        $data = $request->all();
        $buyer = Buyer::where(['cnp' => $data['buyer']['cnp']])->first();
        if (!$buyer)
            $buyer = Buyer::create($data['buyer']);
        $orderRawData = $data['order'];
        $orderRawData['buyer'] = $buyer->id;
        $orderRawData['price'] = ProductType::find($orderRawData['product_type'])->average_price;
        Order::create($orderRawData);

        return redirect('/')->with('success_message', 'Order was successfully added!');
    }
}
