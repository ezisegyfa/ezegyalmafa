<?php

namespace App\Http\Controllers;

use App\Models\County;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountiesFormRequest;
use Exception;

class CountiesController extends Controller
{

    /**
     * Display a listing of the counties.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $counties = County::paginate(25);

        return view('counties.index', compact('counties'));
    }

    /**
     * Show the form for creating a new county.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('counties.create');
    }

    /**
     * Store a new county in the storage.
     *
     * @param App\Http\Requests\CountiesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(CountiesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            County::create($data);

            return redirect()->route('counties.county.index')
                             ->with('success_message', 'County was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified county.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $county = County::findOrFail($id);

        return view('counties.show', compact('county'));
    }

    /**
     * Show the form for editing the specified county.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $county = County::findOrFail($id);
        

        return view('counties.edit', compact('county'));
    }

    /**
     * Update the specified county in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\CountiesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, CountiesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $county = County::findOrFail($id);
            $county->update($data);

            return redirect()->route('counties.county.index')
                             ->with('success_message', 'County was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified county from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $county = County::findOrFail($id);
            $county->delete();

            return redirect()->route('counties.county.index')
                             ->with('success_message', 'County was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
