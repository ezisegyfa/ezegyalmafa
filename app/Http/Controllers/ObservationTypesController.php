<?php

namespace App\Http\Controllers;

use App\Models\ObservationType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ObservationTypesFormRequest;
use Exception;

class ObservationTypesController extends Controller
{

    /**
     * Display a listing of the observation types.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $observationTypes = ObservationType::paginate(25);

        return view('observation_types.index', compact('observationTypes'));
    }

    /**
     * Show the form for creating a new observation type.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('observation_types.create');
    }

    /**
     * Store a new observation type in the storage.
     *
     * @param App\Http\Requests\ObservationTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(ObservationTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            ObservationType::create($data);

            return redirect()->route('observation_types.observation_type.index')
                             ->with('success_message', 'Observation Type was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified observation type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $observationType = ObservationType::findOrFail($id);

        return view('observation_types.show', compact('observationType'));
    }

    /**
     * Show the form for editing the specified observation type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $observationType = ObservationType::findOrFail($id);
        

        return view('observation_types.edit', compact('observationType'));
    }

    /**
     * Update the specified observation type in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\ObservationTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, ObservationTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $observationType = ObservationType::findOrFail($id);
            $observationType->update($data);

            return redirect()->route('observation_types.observation_type.index')
                             ->with('success_message', 'Observation Type was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified observation type from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $observationType = ObservationType::findOrFail($id);
            $observationType->delete();

            return redirect()->route('observation_types.observation_type.index')
                             ->with('success_message', 'Observation Type was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
