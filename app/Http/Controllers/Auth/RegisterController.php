<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Helpers\FormInfos\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    private $ACCESS_CODE = "e10adc3949ba59abbe56e057f20f883e";
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
    protected $redirectTo = '/menu';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'access_code' => ['required', function($attribute, $value, $fail) {
                if (md5($value) !== $this->ACCESS_CODE) 
                    return $fail('Access code is invalid.');
            }]
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm()
    {
        $formInfos = array_slice(User::getFormInfos(), 0, 3);
        array_push($formInfos, new Input('password_confirmation', '', null, 'required|password|max:255'));
        array_push($formInfos, new Input('access_code', '', null, 'required|max:255'));
        return view('auth.register', compact('formInfos'));
    }
}
