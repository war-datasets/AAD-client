<?php

namespace App\Http\Controllers;

use App\Http\Requests\BanUserValidator;
use App\Repositories\UsersRepository;
use Carbon\Carbon;
use Illuminate\Http\{RedirectResponse, Response};
use Illuminate\View\View;

/**
 * Class UsersController
 *
 * @author  Tim Joosten <Topairy@gmail.com>
 * @license MIT License
 * @package App\Http\Controllers
 */
class UsersController extends Controller
{
    // TODO: Register routes for the controller functions.

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
        $this->middleware('role:admin')->except(['destroy']); // Allow normal users to use the destroy function.
        // $this->middleware('forbid-banned-user'); // TODO: Build up and register the middleware.

        $this->usersRepository = $usersRepository;
    }

    /**
     * Get the index management view for the users.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(): View
    {
        return view('users.index', [
            'users' => $this->usersRepository->all('name', 'email', 'created_at')
        ]);
    }

    /**
     * Ban some user account in the system.
     *
     * @param  BanUserValidator $input  The given user input (validated)
     * @param  integer          $userId The unique identifier from the user in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function block(BanUserValidator $input, $userId): RedirectResponse
    {
        $user = $this->usersRepository->find($userId);

        if (auth()->user()->id === $user->id) { // The given user is the currently authencated user.
            flash('Je kan jezelf helaas niet blokkeren.')->warning();
            return redirect()->route('users.index');
		}

        // TODO: Implementatie voor de blokkering van alle api keys in het systeem.
        //       Omdat wanneer een gebruiker geblokkeerd word mag hij zijn sleutels ook niet gebruiken.

        $user->ban(['comment' => $input->reason, 'expired_at' => Carbon::parse($input->eind_datum)]);
        flash("{$user->name} is geblokkeerd tot {$input->end_date}.")->success();

        return redirect()->route('users.index');
    }

    /**
     * Unban an user account
     *
     * @param  iynteger $userId The unique identifier from the user in the database.
     * @return \Illuminate\Http\Response
     */
    public function unblock($userId): Response
    {
        $user = $this->usersRepository->find($userId);

        switch ($user) { // Determine the status from the given user.
            case ($user->isBanned()):
                $user->unban(); // Unban the user in the system
                flash('De gebruiker is terug geactiveerd')->success();
                break;
            case ($user->isNotBanned()):
                // User is not banned. Could not perform any action.
                flash('Wij konden de gebruiker niet activeren.')->warning();
                break;
        }

        return redirect()->route('users.index');
    }

    /**
     * Delete a user account in the system.
     *
     * @param  Integer $userId The unique identifier in the database for the account.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($userId): RedirectResponse
    {
        // TODO: Implement method to delete the user image. Out of the system.
        //       Because they are not deleted currently.

        $user = $this->usersRepository->find($userId);

        if ($this->usersRepository->cannotDeleteUser($user)) {
            return back(302); //User is not permitted to delete an account.
        }

        if ($this->usersRepository->delete($user->id)) {
            flash("Het account van {$user->name} is verwjderd.")->success();
        }

        return redirect()->route('users.index');
    }
}
