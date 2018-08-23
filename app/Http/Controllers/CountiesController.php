<?php

namespace App\Http\Controllers;

use App\Models\county;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $counties = county::paginate(25);

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
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            county::create($data);

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
        $county = county::findOrFail($id);

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
        $county = county::findOrFail($id);
        

        return view('counties.edit', compact('county'));
    }

    /**
     * Update the specified county in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $county = county::findOrFail($id);
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
            $county = county::findOrFail($id);
            $county->delete();

            return redirect()->route('counties.county.index')
                             ->with('success_message', 'County was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:1|max:255',
     
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
