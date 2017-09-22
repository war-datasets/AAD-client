<?php 

namespace App\Repositories;

use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use App\User;

/**
 * Class UsersRepository
 *
 * @package App\Repositories
 */
class UsersRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Check if the authencated user has the permission to delete and account.
     *
     * @param  array $user
     * @return bool
     */
    public function cannotDeleteUser($user)
    {
        return $user->id === auth()->user()->id || auth()->user()->hasRole('admin');
    }
}