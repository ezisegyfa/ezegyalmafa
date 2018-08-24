<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IdentityCardSeries;
use App\Http\Controllers\Controller;
use Exception;

class IdentityCardSeriesController extends Controller
{

    /**
     * Display a listing of the identity card series.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $identityCardSeriesObjects = IdentityCardSeries::paginate(25);

        return view('identity_card_series.index', compact('identityCardSeriesObjects'));
    }

    /**
     * Show the form for creating a new identity card series.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('identity_card_series.create');
    }

    /**
     * Store a new identity card series in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            IdentityCardSeries::create($data);

            return redirect()->route('identity_card_series.identity_card_series.index')
                             ->with('success_message', 'Identity Card Series was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified identity card series.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $identityCardSeries = IdentityCardSeries::findOrFail($id);

        return view('identity_card_series.show', compact('identityCardSeries'));
    }

    /**
     * Show the form for editing the specified identity card series.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $identityCardSeries = IdentityCardSeries::findOrFail($id);
        

        return view('identity_card_series.edit', compact('identityCardSeries'));
    }

    /**
     * Update the specified identity card series in the storage.
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
            
            $identityCardSeries = IdentityCardSeries::findOrFail($id);
            $identityCardSeries->update($data);

            return redirect()->route('identity_card_series.identity_card_series.index')
                             ->with('success_message', 'Identity Card Series was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified identity card series from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $identityCardSeries = IdentityCardSeries::findOrFail($id);
            $identityCardSeries->delete();

            return redirect()->route('identity_card_series.identity_card_series.index')
                             ->with('success_message', 'Identity Card Series was successfully deleted!');

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
            'name' => 'required|string|min:1|max:10',
     
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
