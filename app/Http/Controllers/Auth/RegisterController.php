<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Region;
use App\Helpers\FormInfos\TextInput;
use App\Helpers\FormInfos\Select;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, User::getRequestRules());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }

    public function showUserRegistrationForm()
    {
        $userFormInfos = User::getFormInfos();
        $registerFormInfos = array_slice($userFormInfos, 0, 6);
        $passwordConfirmationInput = new TextInput('password_confirmation', '', null, 'required|max:255');
        array_splice($registerFormInfos, 4, 0, [$passwordConfirmationInput]);
        array_splice($registerFormInfos, 5, 0, [Region::createSelectFormInfos()]);
        array_splice($registerFormInfos, 6, 0, [new Select('location_id', [])]);
        return view('auth.register', compact('registerFormInfos'));
    }
}
