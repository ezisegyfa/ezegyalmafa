<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Region;
use App\Models\UserVerificationRequest;
use App\Models\VerificationRequest;
use App\Helpers\FormInfos\TextInput;
use App\Helpers\FormInfos\Select;
use App\Helpers\FormInfos\CheckBox;
use App\Mail\UserVerificationMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;

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
        $validationRules = User::getRequestRules();
        $validationRules['terms'] = 'required';
        return Validator::make($data, $validationRules);
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
        $createdUser = User::create($data);

        $verificationRequest = VerificationRequest::create([
            'token' => str_random(40)
        ]);

        UserVerificationRequest::create([
            'user_id' => $createdUser->id,
            'verification_request_id' => $verificationRequest->id
        ]);

        \Mail::to($createdUser->email)->send(new UserVerificationMail($createdUser));

        return $createdUser;
    }

    public function showUserRegistrationForm()
    {
        $userFormInfos = User::getFormInfos();
        $registerFormInfos = array_slice($userFormInfos, 0, 7);
        $passwordConfirmationInput = new TextInput('password_confirmation', '', '', 'required|max:255|minLength:8|password');
        unset($registerFormInfos[3]);
        $registerFormInfos[4]->validationRules['password'] = true;
        $registerFormInfos[4]->validationRules['minLength'] = 8;
        array_splice($registerFormInfos, 4, 0, [$passwordConfirmationInput]);
        array_splice($registerFormInfos, 6, 0, [Region::createSelectFormInfos()]);
        array_splice($registerFormInfos, 7, 0, [new Select('location_id', [])]);
        return view('auth.register', compact('registerFormInfos'));
    }

    public function verifyUser($token)
    {
        $verificationRequest = VerificationRequest::where('token', $token)->first();
        if(empty($verificationRequest))
            return redirect('user/login')->with('warning', __("login.Sorry your email cannot be identified."));
        else {
            $userVerificationRequest = $verificationRequest->userVerificationRequest;
            if (empty($userVerificationRequest))
                throw new \Exception("Invalid verification request", 500);
            else {
                $user = $userVerificationRequest->user;
                if (empty($user))
                    throw new \Exception("Invalid verification request", 500);
                else {
                    if ($user->verified)
                        $status = __("login.Your e-mail is already verified. You can now login.");
                    else {
                        $user->verified = 1;
                        $user->save();
                        $status = __("login.Your e-mail is verified. You can now login.");
                    }
                    return redirect('user/login')->with('status', $status);
                }
            }
        }
    }

    protected function registered($request, $user)
    {
        $this->guard()->logout();
        return redirect('user/login')->with('status', __('register.We sent you an activation code. Check your email and click on the link to verify.'));
    }
}
