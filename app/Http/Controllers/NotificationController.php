<?php

namespace App\Http\Controllers;

use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\View\View;

/**
 * Class NotificationController
 *
 * @author  Tim Joosten <topairy@gmail.com>
 * @license MIT LICENSE
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
        // $this->middleware('forbid-banned-user'); // TODO: Register and build up the middleware.
    }

    /**
     * Get the index page for the notifications.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(): View
    {
        $userNotifications= auth()->user()->notifications();

        return view('notifications.index', [
            'unreads'       => $userNotifications->where('read_at', '')->paginate(10),
            'notifications' => $userNotifications->paginate(10)
        ]);
    }

    /**
     * Mark all the unread notifications as read.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markAllAsRead(): RedirectResponse
    {
        auth()->user()->unreadNotifications->markAsRead();
        return back(302);
    }
}
