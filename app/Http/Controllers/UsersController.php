<?php

namespace App\Http\Controllers;

use App\Http\Requests\BanUserValidator;
use App\Repositories\UsersRepository;
use Carbon\Carbon;
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
        return view('users.index', [
            'users' => $this->usersRepository->all('name', 'email', 'created_at')
        ]);
    }

    /**
     * Ban some user account in the system.
     *
     * @param  BanUserValidator $input
     * @param  Integer $userId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function block(BanUserValidator $input, $userId)
    {
        $user = $this->usersRepository->find($userId);

        if (auth()->user()->id === $user->id) { // The given user is the currently authencated user.
            flash('Je kan jezelf helaas niet blokkeren.')->warning();
            return redirect()->route('users.index');
        }

        $user->ban(['comment' => $input->reason, 'expired_at' => Carbon::parse($input->eind_datum)]);
        flash("{$user->name} is geblokkeerd tot {$input->end_date}.")->success();

        return redirect()->route('users.index');
    }

    /**
     * Unban an user account
     *
     * @param  integer $userId
     * @return \Illuminate\Http\Response
     */
    public function unblock($userId)
    {
        $user = $this->usersRepository->find($userId);

        switch ($user) {
            case ($user->isBanned()):
                $user->unban(); // Unban the user in the system
                flash('De gebruiker is terug geactiveerd')->success();
                break;
            case ($user->isNotBanned()):
                flash('Wij konden de gebruiker niet activeren.')->warning();
                break;
        }

        return redirect()->route('users.index');
    }
}
