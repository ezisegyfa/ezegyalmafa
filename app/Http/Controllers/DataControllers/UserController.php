<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Region;
use App\Helpers\FormInfos\Select;
use App\Http\Requests\EditProfileRequest;
use App\Http\Controllers\Crm\CrmController;

class UserController extends CrmController
{
    protected $modelTypeName = 'User';

    public function showEditUserForm()
    {
        $userToEdit = \Auth::user();
        $userFormInfos = $userToEdit->getModelFormInfos();
        $formInfos = array_slice($userFormInfos, 0, 6);
        unset($formInfos[3]);
        $regionFormInfos = Region::createSelectFormInfos();
        $userLocation = $userToEdit->settlement;
        if (empty($userLocation))
            $locationFormInfos = new Select('location_id', []);
        else {
            $regionFormInfos->value = $userLocation->region_id;
            $locationFormInfos = new Select(
                'location_id',
                convertModelsToSelectOptions($userLocation->region->settlements),
                $userLocation->id
            );
        }
        array_splice($formInfos, 4, 0, [$regionFormInfos]);
        array_splice($formInfos, 5, 0, [$locationFormInfos]);
        return view('webshop.profile', compact('formInfos'));
    }

    public function updateProfile(EditProfileRequest $request)
    {
        $userToEdit = \Auth::user();
        $userToEdit->update($request->all());
        return redirect('/')->with('success_message', 'Profile was successfully updated!');
    }
}
