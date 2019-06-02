<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Admin;
use App\Helpers\FormInfos\CheckBox;
use App\Helpers\FormInfos\TextInput;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    public function showUserLoginForm()
    {
        $this->setIntendedUrl();
        return view('auth.login', [
            'baseUrl' => 'user',
            'formInfos' => [
                User::getColumnDefaultFormInfos('email'),
                User::getColumnDefaultFormInfos('password')
            ]
        ]);
    }

    public function userLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (\Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember')))
            return $this->intendedRedirect('/');

        return $this->sendFailedLoginResponse($request);
    }

    public function showAdminLoginForm()
    {
        $this->setIntendedUrl();
        return view('auth.login', [
            'baseUrl' => 'admin',
            'formInfos' => Admin::getFormInfos()
        ]);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (\Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return $this->intendedRedirect('/admin');
        }

        return $this->sendFailedLoginResponse($request);
    }    

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function adminLogout(Request $request)
    {
        \Auth::guard('admin')->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userLogout(Request $request)
    {
        \Auth::guard('user')->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    protected function intendedRedirect(string $defaultUrl = '/')
    {
        $intendedUrl = \Session::get('previous_url');
        if (!empty($intendedUrl))
            return redirect($intendedUrl);
        else
            return redirect()->intended($defaultUrl);
    }

    protected function setIntendedUrl()
    {
        $storedPreviusUrl = \Session::get('previous_url');
        if (array_key_exists('HTTP_REFERER', $_SERVER) && !empty($_SERVER['HTTP_REFERER'])) {
            $previusUrl = rtrim($_SERVER['HTTP_REFERER'], '/');
            if ($previusUrl != $storedPreviusUrl && strpos($previusUrl, 'login') === false)
                \Session::put('previous_url', $previusUrl);
        }
        else if (!empty($storedPreviusUrl))
            \Session::remove('previous_url');
    }
}
