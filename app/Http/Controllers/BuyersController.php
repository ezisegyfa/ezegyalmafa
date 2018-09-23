<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use App\User;
use App\Models\Buyer;
use App\Models\Settlement;
use App\Models\IdentityCardType;
use App\Models\NotificationType;
use App\Models\IdentityCardSeries;
use App\Models\BuyerObservation;
use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\BuyersFormRequest;
use Auth;
use Exception;

class BuyersController extends Controller
{

    /**
     * Display a listing of the buyers.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $columnNames = Buyer::getColumnNames();

        return view('buyers.index', compact('columnNames'));
    }

    public function getQuery()
    {
        return Buyer::getDataTableQuery();
    }

    /**
     * Show the form for creating a new buyer.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $getSettlements = getRenderValues("Settlement");
$getIdentityCardSeries = getRenderValues("IdentityCardSeries");
$getIdentityCardTypes = getRenderValues("IdentityCardType");
$getUploaders = getRenderValues("User");
$getNotificationTypes = getRenderValues("NotificationType");
        
        return view('buyers.create', compact('getSettlements','getIdentityCardSeries','getIdentityCardTypes','getUploaders','getNotificationTypes'));
    }

    /**
     * Store a new buyer in the storage.
     *
     * @param App\Http\Requests\BuyersFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(BuyersFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $data['uploader'] = Auth::user()->id;
            
            Buyer::create($data);

            return redirect()->route('buyers.buyer.index')
                             ->with('success_message', 'Buyer was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified buyer.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $buyerObservationColumnNames = BuyerObservation::getColumnNames();
        $orderColumnNames = Order::getColumnNames();
        $buyer = Buyer::with('getsettlement','getIdentitySeriaType','getIdentityCardType','getUploader','getnotificationtype')->findOrFail($id);

        return view('buyers.show', compact('buyer', 'buyerObservationColumnNames', 'orderColumnNames'));
    }

    /**
     * Show the form for editing the specified buyer.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $buyer = Buyer::findOrFail($id);
        $getSettlements = getRenderValues("Settlement");
$getIdentityCardSeries = getRenderValues("IdentityCardSeries");
$getIdentityCardTypes = getRenderValues("IdentityCardType");
$getUploaders = getRenderValues("User");
$getNotificationTypes = getRenderValues("NotificationType");

        return view('buyers.edit', compact('buyer','getSettlements','getIdentityCardSeries','getIdentityCardTypes','getUploaders','getNotificationTypes'));
    }

    /**
     * Update the specified buyer in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\BuyersFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, BuyersFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $buyer = Buyer::findOrFail($id);
            $buyer->update($data);

            return redirect()->route('buyers.buyer.index')
                             ->with('success_message', 'Buyer was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified buyer from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $buyer = Buyer::findOrFail($id);
            $buyer->delete();

            return redirect()->route('buyers.buyer.index')
                             ->with('success_message', 'Buyer was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
