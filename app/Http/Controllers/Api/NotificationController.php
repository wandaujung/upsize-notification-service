<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'message' => 'required',
        ]);


        $notification = Notification::create([
            'order_id' => $request->order_id,
            'message' => $request->message,
            'status' => 'unread',
        ]);


        return response()->json([
            'status' => true,
            'message' => 'Notification created',
            'data' => $notification
        ]);
    }
}