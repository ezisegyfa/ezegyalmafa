<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Http\Request;
use App\Models\NotificationType;
use App\Models\BuyerNotification;
use App\Http\Controllers\Controller;
use Exception;

class BuyerNotificationsController extends Controller
{

    /**
     * Display a listing of the buyer notifications.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $buyerNotifications = BuyerNotification::paginate(25);

        return view('buyer_notifications.index', compact('buyerNotifications'));
    }

    /**
     * Show the form for creating a new buyer notification.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $getNotificationTypes = NotificationType::pluck('name','id')->all();
$getBuyers = Buyer::pluck('first_name','id')->all();
        
        return view('buyer_notifications.create', compact('getNotificationTypes','getBuyers'));
    }

    /**
     * Store a new buyer notification in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            BuyerNotification::create($data);

            return redirect()->route('buyer_notifications.buyer_notification.index')
                             ->with('success_message', 'Buyer Notification was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified buyer notification.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $buyerNotification = BuyerNotification::with('getnotificationtype','getbuyer')->findOrFail($id);

        return view('buyer_notifications.show', compact('buyerNotification'));
    }

    /**
     * Show the form for editing the specified buyer notification.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $buyerNotification = BuyerNotification::findOrFail($id);
        $getNotificationTypes = NotificationType::pluck('name','id')->all();
$getBuyers = Buyer::pluck('first_name','id')->all();

        return view('buyer_notifications.edit', compact('buyerNotification','getNotificationTypes','getBuyers'));
    }

    /**
     * Update the specified buyer notification in the storage.
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
            
            $buyerNotification = BuyerNotification::findOrFail($id);
            $buyerNotification->update($data);

            return redirect()->route('buyer_notifications.buyer_notification.index')
                             ->with('success_message', 'Buyer Notification was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified buyer notification from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $buyerNotification = BuyerNotification::findOrFail($id);
            $buyerNotification->delete();

            return redirect()->route('buyer_notifications.buyer_notification.index')
                             ->with('success_message', 'Buyer Notification was successfully deleted!');

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
            'buyer' => 'required',
     
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
