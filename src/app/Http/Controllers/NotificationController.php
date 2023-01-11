<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function store(Request $request) {
        $notification = new Notification();
        $notification->user_id = $request->user_id;
        $notification->message = $request->message;
        $notification->route_name = $request->route_name;
        $notification->save();
    }
    //
}
