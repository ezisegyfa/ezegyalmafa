<?php

namespace App\Http\Controllers;

use App\Models\BuyerObservation;
use App\Http\Controllers\Crm\CrmController;

class BuyerObservationController extends CrmController
{
    protected $modelTypeName = 'BuyerObservation';

    public function getByBuyerQuery($buyerId)
    {
        return BuyerObservation::getDataTableQuery(BuyerObservation::where('buyer', $buyerId));
    }
}
