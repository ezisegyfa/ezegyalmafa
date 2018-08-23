<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\userNotification;
use App\Models\NotificationType;
use App\Http\Controllers\Controller;
use Exception;

class UserNotificationsController extends Controller
{

    /**
     * Display a listing of the user notifications.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $userNotifications = userNotification::paginate(25);

        return view('user_notifications.index', compact('userNotifications'));
    }

    /**
     * Show the form for creating a new user notification.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $getNotificationTypes = NotificationType::pluck('name','id')->all();
$getUsers = User::pluck('id','id')->all();
        
        return view('user_notifications.create', compact('getNotificationTypes','getUsers'));
    }

    /**
     * Store a new user notification in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            userNotification::create($data);

            return redirect()->route('user_notifications.user_notification.index')
                             ->with('success_message', 'User Notification was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified user notification.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $userNotification = userNotification::with('getnotificationtype','getuser')->findOrFail($id);

        return view('user_notifications.show', compact('userNotification'));
    }

    /**
     * Show the form for editing the specified user notification.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $userNotification = userNotification::findOrFail($id);
        $getNotificationTypes = NotificationType::pluck('name','id')->all();
$getUsers = User::pluck('id','id')->all();

        return view('user_notifications.edit', compact('userNotification','getNotificationTypes','getUsers'));
    }

    /**
     * Update the specified user notification in the storage.
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
            
            $userNotification = userNotification::findOrFail($id);
            $userNotification->update($data);

            return redirect()->route('user_notifications.user_notification.index')
                             ->with('success_message', 'User Notification was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified user notification from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $userNotification = userNotification::findOrFail($id);
            $userNotification->delete();

            return redirect()->route('user_notifications.user_notification.index')
                             ->with('success_message', 'User Notification was successfully deleted!');

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
            'text' => 'required',
            'score' => 'required|string|min:1',
            'type' => 'required',
            'user' => 'required',
     
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
