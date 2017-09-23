<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountInfoValidator;
use App\Http\Requests\AccountSecurityValidator;
use App\Repositories\ApiKeyRepository;
use App\Repositories\UsersRepository;
use Intervention\Image\Facades\Image;
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

        if ($input->hasFile('avatar')) {
            $avatar = public_path(auth()->user()->profile_image);

            if (file_exists($avatar) && auth()->user()->profile_image != 'avatars/default.jpg') {
                unlink(public_path(auth()->user()->profile_image));
            }

            $image      = $input->file('avatar');
            $filename   = time() . '.' . $image->getClientOriginalExtension();
            $path       = public_path('avatars/' . $filename);
            Image::make($image->getRealPath())->resize(160, 160)->save($path);

            $input->merge(['profile_image' => "avatars/{$filename}"]);
        }

        if ($this->usersRepository->update($input->except(['_token', 'avatar']), auth()->user()->id)) {
            flash('Wij hebben uw account informatie aangepast.')->success();
        }

        return redirect()->route('account.settings');
    }

    /**
     * Update function for the user password.
     *
     * @param  AccountSecurityValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateSecurity(AccountSecurityValidator $input)
    {
        //  TODO: Register route and connect it to the form.

        if ($this->usersRepository->update(['password' => bcrypt($input->password)])) {
            flash("Wij hebben je account beveiliging aangepast.")->success();
        }

        return back(302);
    }
}
