<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\IdentityCardType;
use App\Models\IdentityCardSeries;
use App\Http\Controllers\Controller;
use Exception;

class UsersController extends Controller
{

    /**
     * Display a listing of the users.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $users = user::paginate(25);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $getCities = City::pluck('name','id')->all();
$getIdentityCardSeries = IdentityCardSeries::pluck('name','id')->all();
$getIdentityCardTypes = IdentityCardType::pluck('name','id')->all();
        
        return view('users.create', compact('getCities','getIdentityCardSeries','getIdentityCardTypes'));
    }

    /**
     * Store a new user in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            user::create($data);

            return redirect()->route('users.user.index')
                             ->with('success_message', 'User was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified user.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $user = user::with('getcity','getidentitycardseries','getidentitycardtype')->findOrFail($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $user = user::findOrFail($id);
        $getCities = City::pluck('name','id')->all();
$getIdentityCardSeries = IdentityCardSeries::pluck('name','id')->all();
$getIdentityCardTypes = IdentityCardType::pluck('name','id')->all();

        return view('users.edit', compact('user','getCities','getIdentityCardSeries','getIdentityCardTypes'));
    }

    /**
     * Update the specified user in the storage.
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
            
            $user = user::findOrFail($id);
            $user->update($data);

            return redirect()->route('users.user.index')
                             ->with('success_message', 'User was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified user from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $user = user::findOrFail($id);
            $user->delete();

            return redirect()->route('users.user.index')
                             ->with('success_message', 'User was successfully deleted!');

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
