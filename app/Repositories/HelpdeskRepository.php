<?php 

namespace App\Repositories;

use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use App\Helpdesk;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HelpdeskRepository
 *
 * @package App\Repositories
 */
class HelpdeskRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model()
    {
        return Helpdesk::class;
    }

    /**
     * Return a model instance from the repository.
     *
     * @return Model
     */
    public function entity()
    {
        return $this->model;
    }
}