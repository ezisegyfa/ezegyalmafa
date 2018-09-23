<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use App\Models\Car;
use App\User;
use App\Models\CarType;
use App\Http\Controllers\Controller;
use App\Http\Requests\CarsFormRequest;
use Auth;
use Exception;

class CarsController extends Controller
{

    /**
     * Display a listing of the cars.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $columnNames = Car::getColumnNames();

        return view('cars.index', compact('columnNames'));
    }

    public function getQuery()
    {
        return Car::getDataTableQuery();
    }

    public function getByDriverQuery($driverId)
    {
        return Car::getDataTableQuery(Car::getWithCarsQuery()->where('drivers.id', $driverId));
    }

    /**
     * Show the form for creating a new car.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $getCarTypes = getRenderValues("CarType");
$getUploaders = getRenderValues("User");
        
        return view('cars.create', compact('getCarTypes','getUploaders'));
    }

    /**
     * Store a new car in the storage.
     *
     * @param App\Http\Requests\CarsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(CarsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $data['uploader'] = Auth::user()->id;
            
            Car::create($data);

            return redirect()->route('cars.car.index')
                             ->with('success_message', 'Car was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified car.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $car = Car::with('getcartype','getUploader')->findOrFail($id);

        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified car.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $getCarTypes = getRenderValues("CarType");
$getUploaders = getRenderValues("User");

        return view('cars.edit', compact('car','getCarTypes','getUploaders'));
    }

    /**
     * Update the specified car in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\CarsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, CarsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $car = Car::findOrFail($id);
            $car->update($data);

            return redirect()->route('cars.car.index')
                             ->with('success_message', 'Car was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified car from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $car = Car::findOrFail($id);
            $car->delete();

            return redirect()->route('cars.car.index')
                             ->with('success_message', 'Car was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
