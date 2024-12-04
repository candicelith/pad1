<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //
    public function markAsRead()
    {
        Notification::where('id_users', Auth::id())->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }
}
