<?php 

namespace App\Repositories;

use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use App\Status;

/**
 * Class StatusRepository
 *
 * @package App\Repositories
 */
class StatusRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model()
    {
        return Status::class;
    }
}