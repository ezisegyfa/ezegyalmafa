<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CarsFormRequest;
use Illuminate\Support\Facades\Artisan;

class SetupController extends Controller
{
    public function setup()
    {
        Artisan::call("config:cache");
    }
}
