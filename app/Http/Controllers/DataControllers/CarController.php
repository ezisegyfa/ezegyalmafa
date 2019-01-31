<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Controllers\Crm\CrmController;

class CarController extends CrmController
{
    public function getByDriverQuery($driverId)
    {
        return Car::getDataTableQuery(Car::getWithCarsQuery()->where('drivers.id', $driverId));
    }
}
