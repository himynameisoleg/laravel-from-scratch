<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationsController extends Controller
{
    public function show()
    {
        // $notifications = auth()->user()->unreadNotifications;

        // $notifications->markAsRead();

        // return view('notifications.show', [
        //     'notifications' => $notifications
        // ]);

        // Or do it the fancy way using "higher order tap" when using something that returns void like markAsRead():
        return view('notifications.show', [
            'notifications' => tap( auth()->user()->unreadNotifications )->markAsRead()
        ]);
    }
}
