<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use App\Models\Car;
use App\Models\Driver;
use App\Models\DriverCar;
use App\Http\Controllers\Controller;
use App\Http\Requests\DriverCarsFormRequest;
use Exception;

class DriverCarsController extends Controller
{

    /**
     * Display a listing of the driver cars.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $columnNames = DriverCar::getColumnNames();

        return view('driver_cars.index', compact('columnNames'));
    }

    public function getQuery()
    {
        return DriverCar::getDataTableQuery();
    }

    /**
     * Show the form for creating a new driver car.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $getDrivers = getRenderValues("Driver");
$getCars = getRenderValues("Car");
        
        return view('driver_cars.create', compact('getDrivers','getCars'));
    }

    /**
     * Store a new driver car in the storage.
     *
     * @param App\Http\Requests\DriverCarsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(DriverCarsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            DriverCar::create($data);

            return redirect()->route('driver_cars.driver_car.index')
                             ->with('success_message', 'Driver Car was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified driver car.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $driverCar = DriverCar::with('getdriver','getcar')->findOrFail($id);

        return view('driver_cars.show', compact('driverCar'));
    }

    /**
     * Show the form for editing the specified driver car.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $driverCar = DriverCar::findOrFail($id);
        $getDrivers = getRenderValues("Driver");
$getCars = getRenderValues("Car");

        return view('driver_cars.edit', compact('driverCar','getDrivers','getCars'));
    }

    /**
     * Update the specified driver car in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\DriverCarsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, DriverCarsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $driverCar = DriverCar::findOrFail($id);
            $driverCar->update($data);

            return redirect()->route('driver_cars.driver_car.index')
                             ->with('success_message', 'Driver Car was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified driver car from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $driverCar = DriverCar::findOrFail($id);
            $driverCar->delete();

            return redirect()->route('driver_cars.driver_car.index')
                             ->with('success_message', 'Driver Car was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
