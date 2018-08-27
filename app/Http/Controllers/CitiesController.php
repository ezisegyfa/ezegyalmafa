<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\County;
use App\Http\Controllers\Controller;
use App\Http\Requests\CitiesFormRequest;
use Exception;

class CitiesController extends Controller
{

    /**
     * Display a listing of the cities.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $cities = City::with('getcounty')->paginate(25);

        return view('cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new city.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $getCounties = County::pluck('name','id')->all();
        
        return view('cities.create', compact('getCounties'));
    }

    /**
     * Store a new city in the storage.
     *
     * @param App\Http\Requests\CitiesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(CitiesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            City::create($data);

            return redirect()->route('cities.city.index')
                             ->with('success_message', 'City was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified city.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $city = City::with('getcounty')->findOrFail($id);

        return view('cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified city.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $city = City::findOrFail($id);
        $getCounties = County::pluck('name','id')->all();

        return view('cities.edit', compact('city','getCounties'));
    }

    /**
     * Update the specified city in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\CitiesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, CitiesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $city = City::findOrFail($id);
            $city->update($data);

            return redirect()->route('cities.city.index')
                             ->with('success_message', 'City was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified city from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $city = City::findOrFail($id);
            $city->delete();

            return redirect()->route('cities.city.index')
                             ->with('success_message', 'City was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
