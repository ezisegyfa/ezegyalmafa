<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use App\Models\ProcessType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProcessTypesFormRequest;
use Exception;

class ProcessTypesController extends Controller
{

    /**
     * Display a listing of the process types.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $columnNames = ProcessType::getColumnNames();

        return view('process_types.index', compact('columnNames'));
    }

    public function getQuery()
    {
        return ProcessType::getDataTableQuery();
    }

    /**
     * Show the form for creating a new process type.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('process_types.create');
    }

    /**
     * Store a new process type in the storage.
     *
     * @param App\Http\Requests\ProcessTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(ProcessTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            ProcessType::create($data);

            return redirect()->route('process_types.process_type.index')
                             ->with('success_message', 'Process Type was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified process type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $processType = ProcessType::findOrFail($id);

        return view('process_types.show', compact('processType'));
    }

    /**
     * Show the form for editing the specified process type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $processType = ProcessType::findOrFail($id);
        

        return view('process_types.edit', compact('processType'));
    }

    /**
     * Update the specified process type in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\ProcessTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, ProcessTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $processType = ProcessType::findOrFail($id);
            $processType->update($data);

            return redirect()->route('process_types.process_type.index')
                             ->with('success_message', 'Process Type was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified process type from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $processType = ProcessType::findOrFail($id);
            $processType->delete();

            return redirect()->route('process_types.process_type.index')
                             ->with('success_message', 'Process Type was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
