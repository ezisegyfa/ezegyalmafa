<?php

namespace App\Http\Controllers;

use App\Models\Transport;
use App\Http\Controllers\Crm\CrmController;

class TransportController extends CrmController
{
    public function getByDriverQuery()
    {
        return Transport::getDataTableQuery(Transport::where('driver'));
    }

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
}
