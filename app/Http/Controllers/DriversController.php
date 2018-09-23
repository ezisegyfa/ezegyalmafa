<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use App\User;
use App\Models\Driver;
use App\Models\Transport;
use App\Models\Car;
use App\Http\Controllers\Controller;
use App\Http\Requests\DriversFormRequest;
use Auth;
use Exception;

class DriversController extends Controller
{

    /**
     * Display a listing of the drivers.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $columnNames = Driver::getColumnNames();

        return view('drivers.index', compact('columnNames'));
    }

    public function getQuery()
    {
        return Driver::getDataTableQuery();
    }

    /**
     * Show the form for creating a new driver.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $getUploaders = getRenderValues("User");
        
        return view('drivers.create', compact('getUploaders'));
    }

    /**
     * Store a new driver in the storage.
     *
     * @param App\Http\Requests\DriversFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(DriversFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $data['uploader'] = Auth::user()->id;
            
            Driver::create($data);

            return redirect()->route('drivers.driver.index')
                             ->with('success_message', 'Driver was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified driver.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $driver = Driver::with('getUploader')->findOrFail($id);
        $transportColumnNames = Transport::getColumnNames();
        $carColumnNames = Car::getColumnNames();

        return view('drivers.show', compact('driver', 'transportColumnNames', 'carColumnNames'));
    }

    /**
     * Show the form for editing the specified driver.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $driver = Driver::findOrFail($id);
        $getUploaders = getRenderValues("User");

        return view('drivers.edit', compact('driver','getUploaders'));
    }

    /**
     * Update the specified driver in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\DriversFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, DriversFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $driver = Driver::findOrFail($id);
            $driver->update($data);

            return redirect()->route('drivers.driver.index')
                             ->with('success_message', 'Driver was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified driver from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $driver = Driver::findOrFail($id);
            $driver->delete();

            return redirect()->route('drivers.driver.index')
                             ->with('success_message', 'Driver was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
