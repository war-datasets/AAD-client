<?php 

namespace App\Repositories;

use App\ApiKey;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;

/**
 * Class ApiKeyRepository
 *
 * @package App\Repositories
 */
class ApiKeyRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model()
    {
        return ApiKey::class;
    }

    /**
     * Create the new API access token in the database.
     *
     * @param  string $serviceName The name from the service where the key is used.
     * @return mixed
     */
    public function createKey($serviceName)
    {
        if ($dbKey = $this->model->make(auth()->user())) {
            if ($this->update(['service' => $serviceName], $dbKey->id)) {
                return $dbKey->key; // return the genrated api key.
            }
        }

        return false; // The apikey nor the service name could be stored in the database.
    }

    /**
     * Check if the current user can delete the api key.
     *
     * @param  mixed   $user        The current authencated user.
     * @param  integer $apiKeyId    The primary identifier in the database.
     * @return bool
     */
    public function permissionCheck($user, $apiKeyId)
    {
        $keyCheck = $this->model->find($apiKeyId);
        return $user->hasRole('admin') || $keyCheck->apikeyable_id === $user->id;
    }
}