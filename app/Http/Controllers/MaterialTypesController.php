<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use App\Models\MaterialType;
use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialTypesFormRequest;
use Exception;

class MaterialTypesController extends Controller
{

    /**
     * Display a listing of the material types.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $columnNames = MaterialType::getColumnNames();

        return view('material_types.index', compact('columnNames'));
    }

    public function getQuery()
    {
        return MaterialType::getDataTableQuery();
    }

    /**
     * Show the form for creating a new material type.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('material_types.create');
    }

    /**
     * Store a new material type in the storage.
     *
     * @param App\Http\Requests\MaterialTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(MaterialTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            MaterialType::create($data);

            return redirect()->route('material_types.material_type.index')
                             ->with('success_message', 'Material Type was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified material type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $materialType = MaterialType::findOrFail($id);

        return view('material_types.show', compact('materialType'));
    }

    /**
     * Show the form for editing the specified material type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $materialType = MaterialType::findOrFail($id);
        

        return view('material_types.edit', compact('materialType'));
    }

    /**
     * Update the specified material type in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\MaterialTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, MaterialTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $materialType = MaterialType::findOrFail($id);
            $materialType->update($data);

            return redirect()->route('material_types.material_type.index')
                             ->with('success_message', 'Material Type was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified material type from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $materialType = MaterialType::findOrFail($id);
            $materialType->delete();

            return redirect()->route('material_types.material_type.index')
                             ->with('success_message', 'Material Type was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
