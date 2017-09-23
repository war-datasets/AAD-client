<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

/**
 * Class NotificationController
 *
 * @package App\Http\Controllers
 */
class NotificationController extends Controller
{
    /**
     * NotificationController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get the index page for the notifications.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $userNotifications= auth()->user()->notifications();

        return view('notifications.index', [
            'unreads'       => $userNotifications->where('read_at', '')->paginate(10),
            'notifications' => $userNotifications->paginate(10)
        ]);
    }

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return back(302);
    }
}
