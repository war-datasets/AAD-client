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
}