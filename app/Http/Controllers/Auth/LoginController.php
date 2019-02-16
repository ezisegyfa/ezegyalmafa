<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Helpers\FormInfos\CheckBox;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $formInfos = [
            User::getColumnDefaultFormInfos('email'),
            User::getColumnDefaultFormInfos('password'),
            new CheckBox('remember', 'Remember me')
        ];
        $sendButtonTitle = __('view.login');
        return view('auth.login', compact('formInfos', 'sendButtonTitle'));
    }
}
