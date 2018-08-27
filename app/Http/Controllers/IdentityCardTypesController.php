<?php

namespace App\Http\Controllers;

use App\Models\IdentityCardType;
use App\Http\Controllers\Controller;
use App\Http\Requests\IdentityCardTypesFormRequest;
use Exception;

class IdentityCardTypesController extends Controller
{

    /**
     * Display a listing of the identity card types.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $identityCardTypes = IdentityCardType::paginate(25);

        return view('identity_card_types.index', compact('identityCardTypes'));
    }

    /**
     * Show the form for creating a new identity card type.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('identity_card_types.create');
    }

    /**
     * Store a new identity card type in the storage.
     *
     * @param App\Http\Requests\IdentityCardTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(IdentityCardTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            IdentityCardType::create($data);

            return redirect()->route('identity_card_types.identity_card_type.index')
                             ->with('success_message', 'Identity Card Type was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified identity card type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $identityCardType = IdentityCardType::findOrFail($id);

        return view('identity_card_types.show', compact('identityCardType'));
    }

    /**
     * Show the form for editing the specified identity card type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $identityCardType = IdentityCardType::findOrFail($id);
        

        return view('identity_card_types.edit', compact('identityCardType'));
    }

    /**
     * Update the specified identity card type in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\IdentityCardTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, IdentityCardTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $identityCardType = IdentityCardType::findOrFail($id);
            $identityCardType->update($data);

            return redirect()->route('identity_card_types.identity_card_type.index')
                             ->with('success_message', 'Identity Card Type was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified identity card type from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $identityCardType = IdentityCardType::findOrFail($id);
            $identityCardType->delete();

            return redirect()->route('identity_card_types.identity_card_type.index')
                             ->with('success_message', 'Identity Card Type was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
