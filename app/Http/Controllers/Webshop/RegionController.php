<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLocations($regionId)
    {
        $locationOptions = Region::findOrFail($regionId)->settlements->map(function($location) {
            $locationOption = new \stdClass;
            $locationOption->value = $location->id;
            $locationOption->label = $location->name;
            return $locationOption;
        });
        return response()->json($locationOptions);
    }
}
