<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountInfoValidator;
use App\Http\Requests\AccountSecurityValidator;
use App\Repositories\ApiKeyRepository;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;

/**
 * Class AccountController
 *
 * @package App\Http\Controllers
 */
class AccountController extends Controller
{
    private $usersRepository;  /** @var UsersRepository  $usersRepository  */
    private $apiKeyRepository; /** @var ApiKeyRepository $apiKeyRepository */

    /**
     * AccountController constructor.
     *
     * @param UsersRepository  $usersRepository     The abstraction layer for the user DB table.
     * @param ApiKeyRepository $apiKeyRepository    The abstraction layer for the ApiKey Db table.
     */
    public function __construct(UsersRepository $usersRepository, ApiKeyRepository $apiKeyRepository)
    {
        $this->middleware('auth');

        $this->usersRepository  = $usersRepository;
        $this->apiKeyRepository = $apiKeyRepository;
    }

    /**
     * Get the account configuration index page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('account.index', [
            'keys' => $this->apiKeyRepository->all(['id', 'service', 'key']),
            'user' => $this->usersRepository->find(auth()->user()->id),
        ]);
    }

    /**
     * Update function for the account information.
     *
     * @param  AccountInfoValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateInfo(AccountInfoValidator $input)
    {
        // TODO: Implement method that allow to set/change user avatars.
        // TODO: Register route and connect it to the form.

        if ($this->usersRepository->update($input->except(['_token']), auth()->user()->id)) {
            flash('Wij hebben uw account informatie aangepast.')->success();
        }

        return back(302);
    }

    /**
     * Update function for the user password.
     *
     * @param  AccountSecurityValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateSecurity(AccountSecurityValidator $input)
    {
        // TODO: Implement update logic. (database)
        // TODO: Register route and connect it to the form.

        return back(302);
    }
}
