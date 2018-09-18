<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use App\Models\NotificationType;
use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationTypesFormRequest;
use Exception;

class NotificationTypesController extends Controller
{

    /**
     * Display a listing of the notification types.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $columnNames = NotificationType::getColumnNames();

        return view('notification_types.index', compact('columnNames'));
    }

    public function getQuery()
    {
        return NotificationType::getDataTableQuery();
    }

    /**
     * Show the form for creating a new notification type.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('notification_types.create');
    }

    /**
     * Store a new notification type in the storage.
     *
     * @param App\Http\Requests\NotificationTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(NotificationTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            NotificationType::create($data);

            return redirect()->route('notification_types.notification_type.index')
                             ->with('success_message', 'Notification Type was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified notification type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $notificationType = NotificationType::findOrFail($id);

        return view('notification_types.show', compact('notificationType'));
    }

    /**
     * Show the form for editing the specified notification type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $notificationType = NotificationType::findOrFail($id);
        

        return view('notification_types.edit', compact('notificationType'));
    }

    /**
     * Update the specified notification type in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\NotificationTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, NotificationTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $notificationType = NotificationType::findOrFail($id);
            $notificationType->update($data);

            return redirect()->route('notification_types.notification_type.index')
                             ->with('success_message', 'Notification Type was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified notification type from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $notificationType = NotificationType::findOrFail($id);
            $notificationType->delete();

            return redirect()->route('notification_types.notification_type.index')
                             ->with('success_message', 'Notification Type was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
