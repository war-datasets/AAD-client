<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiKeyValidator;
use App\Repositories\{ApiKeyRepository, UsersRepository};

use Illuminate\Http\Response;

/**
 * Class ApiKeyController
 *
 * @package App\Http\Controllers
 */
class ApiKeyController extends Controller
{
    private $apiKeyRepository;  /** @var ApiKeyRepository $apiKeyRepository */
    private $userRepository;    /** @var UsersRepository  $usersRepository  */

    /**
     * ApiKeycontroller constructor.
     *
     * @param  ApiKeyRepository $apiKeyRepository   The abstraction layer for the users DB table.
     * @param  UsersRepository  $usersRepository    The abstraction layer for the apikey db table.
     */
    public function __construct(ApiKeyRepository $apiKeyRepository, UsersRepository $usersRepository)
    {
        $this->middleware('auth');

        $this->apiKeyRepository = $apiKeyRepository;
        $this->userRepository   = $usersRepository;
    }

    /**
     * Create a new API access token in the system.
     *
     * @param  ApiKeyValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(ApiKeyValidator $input)
    {
        if ($apiKey = $this->apiKeyRepository->createKey($input->service)) {
            flash("De api sleutel: {$apiKey} is aangemaakt.")->success();
            session()->flash('tab-status', 'api-key');
        }

        return redirect()->route('account.settings');
    }

    /**
     * Delete some API access token in the system.
     *
     * @param  integer $keyId The primary identifier from the access token.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($keyId)
    {
        if ($this->apiKeyRepository->permissionCheck(auth()->user(), $keyId)) {
            if ((int) count($this->apiKeyRepository->find($keyId)) === 1) {
                $this->apiKeyRepository->delete($keyId);

                flash('De API sleutel is verwijderd.')->success();
                session()->flash('tab-status', 'api-key');
            }

            return redirect()->route('account.settings');
        }

        return app()->abort(Response::HTTP_FORBIDDEN); // The user hasn't the right permissions.
    }
}
