<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use App\Models\IdentityCardSeries;
use App\Http\Controllers\Controller;
use App\Http\Requests\IdentityCardSeriesFormRequest;
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
        $columnNames = IdentityCardSeries::getColumnNames();

        return view('identity_card_series.index', compact('columnNames'));
    }

    public function getQuery()
    {
        return IdentityCardSeries::getDataTableQuery();
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
     * @param App\Http\Requests\IdentityCardSeriesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(IdentityCardSeriesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
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
     * @param App\Http\Requests\IdentityCardSeriesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, IdentityCardSeriesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
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



}
