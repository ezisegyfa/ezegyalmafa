<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Buyer;
use Illuminate\Http\Request;
use App\Models\IdentityCardType;
use App\Models\IdentityCardSeries;
use App\Http\Controllers\Controller;
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
        $buyers = Buyer::paginate(25);

        return view('buyers.index', compact('buyers'));
    }

    /**
     * Show the form for creating a new buyer.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $getCities = City::pluck('name','id')->all();
$getIdentityCardSeries = IdentityCardSeries::pluck('name','id')->all();
$getIdentityCardTypes = IdentityCardType::pluck('name','id')->all();
        
        return view('buyers.create', compact('getCities','getIdentityCardSeries','getIdentityCardTypes'));
    }

    /**
     * Store a new buyer in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
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
        $buyer = Buyer::with('getcity','getidentitycardseries','getidentitycardtype')->findOrFail($id);

        return view('buyers.show', compact('buyer'));
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
        $getCities = City::pluck('name','id')->all();
$getIdentityCardSeries = IdentityCardSeries::pluck('name','id')->all();
$getIdentityCardTypes = IdentityCardType::pluck('name','id')->all();

        return view('buyers.edit', compact('buyer','getCities','getIdentityCardSeries','getIdentityCardTypes'));
    }

    /**
     * Update the specified buyer in the storage.
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

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'first_name' => 'required|string|min:1|max:255',
            'last_name' => 'required|string|min:1|max:255',
            'email' => 'nullable|string|min:0|max:255',
            'phone_number' => 'required|numeric|string|min:1|max:15',
            'adress' => 'required',
            'cnp' => 'required|string|min:1|max:10',
            'seria_nr' => 'required|string|min:1|max:10',
            'city' => 'required',
            'seria' => 'required',
            'identity_card_type' => 'required',
     
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
