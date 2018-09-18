<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use App\User;
use App\Models\Buyer;
use App\Models\ObservationType;
use App\Models\BuyerObservation;
use App\Http\Controllers\Controller;
use App\Http\Requests\BuyerObservationsFormRequest;
use Auth;
use Exception;

class BuyerObservationsController extends Controller
{

    /**
     * Display a listing of the buyer observations.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $columnNames = BuyerObservation::getColumnNames();

        return view('buyer_observations.index', compact('columnNames'));
    }

    public function getQuery()
    {
        return BuyerObservation::getDataTableQuery();
    }

    /**
     * Show the form for creating a new buyer observation.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $getObservationTypes = getRenderValues("ObservationType");
$getBuyers = getRenderValues("Buyer");
$getUsers = getRenderValues("User");
        
        return view('buyer_observations.create', compact('getObservationTypes','getBuyers','getUsers'));
    }

    /**
     * Store a new buyer observation in the storage.
     *
     * @param App\Http\Requests\BuyerObservationsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(BuyerObservationsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $data['uploader'] = Auth::user()->id;

            BuyerObservation::create($data);

            return redirect()->route('buyer_observations.buyer_observation.index')
                             ->with('success_message', 'Buyer Observation was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified buyer observation.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $buyerObservation = BuyerObservation::with('getobservationtype','getbuyer','getuser')->findOrFail($id);

        return view('buyer_observations.show', compact('buyerObservation'));
    }

    /**
     * Show the form for editing the specified buyer observation.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $buyerObservation = BuyerObservation::findOrFail($id);
        $getObservationTypes = getRenderValues("ObservationType");
$getBuyers = getRenderValues("Buyer");
$getUsers = getRenderValues("User");

        return view('buyer_observations.edit', compact('buyerObservation','getObservationTypes','getBuyers','getUsers'));
    }

    /**
     * Update the specified buyer observation in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\BuyerObservationsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, BuyerObservationsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $buyerObservation = BuyerObservation::findOrFail($id);
            $buyerObservation->update($data);

            return redirect()->route('buyer_observations.buyer_observation.index')
                             ->with('success_message', 'Buyer Observation was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified buyer observation from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $buyerObservation = BuyerObservation::findOrFail($id);
            $buyerObservation->delete();

            return redirect()->route('buyer_observations.buyer_observation.index')
                             ->with('success_message', 'Buyer Observation was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
