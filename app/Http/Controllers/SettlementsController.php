<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use App\Models\Region;
use App\Models\Settlement;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettlementsFormRequest;
use Exception;

class SettlementsController extends Controller
{

    /**
     * Display a listing of the settlements.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $columnNames = Settlement::getColumnNames();

        return view('settlements.index', compact('columnNames'));
    }

    public function getQuery()
    {
        return Settlement::getDataTableQuery();
    }

    /**
     * Show the form for creating a new settlement.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $getRegions = getRenderValues("Region");
        
        return view('settlements.create', compact('getRegions'));
    }

    /**
     * Store a new settlement in the storage.
     *
     * @param App\Http\Requests\SettlementsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(SettlementsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Settlement::create($data);

            return redirect()->route('settlements.settlement.index')
                             ->with('success_message', 'Settlement was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified settlement.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $settlement = Settlement::with('getregion')->findOrFail($id);

        return view('settlements.show', compact('settlement'));
    }

    /**
     * Show the form for editing the specified settlement.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $settlement = Settlement::findOrFail($id);
        $getRegions = getRenderValues("Region");

        return view('settlements.edit', compact('settlement','getRegions'));
    }

    /**
     * Update the specified settlement in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\SettlementsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, SettlementsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $settlement = Settlement::findOrFail($id);
            $settlement->update($data);

            return redirect()->route('settlements.settlement.index')
                             ->with('success_message', 'Settlement was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified settlement from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $settlement = Settlement::findOrFail($id);
            $settlement->delete();

            return redirect()->route('settlements.settlement.index')
                             ->with('success_message', 'Settlement was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
