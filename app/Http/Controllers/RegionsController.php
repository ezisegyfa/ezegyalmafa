<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use App\Models\Region;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegionsFormRequest;
use Exception;

class RegionsController extends Controller
{

    /**
     * Display a listing of the regions.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $columnNames = Region::getColumnNames();

        return view('regions.index', compact('columnNames'));
    }

    public function getQuery()
    {
        return Region::getDataTableQuery();
    }

    /**
     * Show the form for creating a new region.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('regions.create');
    }

    /**
     * Store a new region in the storage.
     *
     * @param App\Http\Requests\RegionsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(RegionsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Region::create($data);

            return redirect()->route('regions.region.index')
                             ->with('success_message', 'Region was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified region.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $region = Region::findOrFail($id);

        return view('regions.show', compact('region'));
    }

    /**
     * Show the form for editing the specified region.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $region = Region::findOrFail($id);
        

        return view('regions.edit', compact('region'));
    }

    /**
     * Update the specified region in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\RegionsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, RegionsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $region = Region::findOrFail($id);
            $region->update($data);

            return redirect()->route('regions.region.index')
                             ->with('success_message', 'Region was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified region from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $region = Region::findOrFail($id);
            $region->delete();

            return redirect()->route('regions.region.index')
                             ->with('success_message', 'Region was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
