<?php

namespace App\Http\Controllers;

use App\Http\Requests\BanUserValidator;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;

/**
 * Class UsersController
 *
 * @package App\Http\Controllers
 */
class UsersController extends Controller
{
    /**
     * The variable for the database abstraction layer.
     *
     * @var UsersRepository
     */
    private $usersRepository;

    /**
     * UsersController constructor.
     *
     * @param UsersRepository $usersRepository The abstraction layer for the user DB table.
     */
    public function __construct(UsersRepository $usersRepository)
    {
        $this->middleware('auth');

        $this->usersRepository = $usersRepository;
    }

    /**
     * Get the index management view for the users.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = $this->usersRepository->all(['name', 'email', 'created_at']);
        return view('users.index', compact('users'));
    }

    public function block(BanUserValidator $input, $userId)
    {
        // STEPS:
        // ---
        // 1) Save the ban in the database.
        // 2) Send mail as information for the affected user.
        // 3) Log out the current is he is online.
        // 4) Deny access to api keys.

    }
}
