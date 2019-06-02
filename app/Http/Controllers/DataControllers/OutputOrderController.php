<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderInfo;
use App\Models\OutputOrder;
use App\Http\Controllers\Crm\CrmController;

class OutputOrderController extends CrmController
{
    protected $modelTypeName = 'OutputOrder';

    public function getUncomplitedQuery()
    {
        return Order::getDataTableQuery(Order::getUncomplitedOrdersQuery());
    }

    public function getByBuyerQuery($buyerId)
    {
        return Order::getDataTableQuery(Order::where('buyer', $buyerId));
    }

    public function webshopStore(Request $request)
    {
        $data = $request->all();

        $orderInfo = OrderInfo::create([
            'quantity' => $data['quantity'],
            'sell_price' => $data['sell_price'],
            'product_type_id' => $data['product_type_id'],
        ]);

        $outputOrder = OutputOrder::create([
            'order_info_id' => $orderInfo->id,
            'buyer_id' => \Auth()->user()->id,
            'region_id' => $data['region_id'],
            'location_id' => $data['location_id'],
            'address' => $data['address']
        ]);

        return redirect('/')->with('success_message', 'Order was successfully added!');
    }
}
