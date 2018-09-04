<?php

namespace App\Http\Controllers;

use App\Models\CarType;
use App\Http\Controllers\Controller;
use App\Http\Requests\CarTypesFormRequest;
use Exception;

class CarTypesController extends Controller
{

    /**
     * Display a listing of the car types.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $carTypes = CarType::paginate(25);

        return view('car_types.index', compact('carTypes'));
    }

    /**
     * Show the form for creating a new car type.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('car_types.create');
    }

    /**
     * Store a new car type in the storage.
     *
     * @param App\Http\Requests\CarTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(CarTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            CarType::create($data);

            return redirect()->route('car_types.car_type.index')
                             ->with('success_message', 'Car Type was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified car type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $carType = CarType::findOrFail($id);

        return view('car_types.show', compact('carType'));
    }

    /**
     * Show the form for editing the specified car type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $carType = CarType::findOrFail($id);
        

        return view('car_types.edit', compact('carType'));
    }

    /**
     * Update the specified car type in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\CarTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, CarTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $carType = CarType::findOrFail($id);
            $carType->update($data);

            return redirect()->route('car_types.car_type.index')
                             ->with('success_message', 'Car Type was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified car type from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $carType = CarType::findOrFail($id);
            $carType->delete();

            return redirect()->route('car_types.car_type.index')
                             ->with('success_message', 'Car Type was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
