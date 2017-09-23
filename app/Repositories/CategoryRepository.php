<?php 

namespace App\Repositories;

use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use App\Categories;

/**
 * Class CategoryRepository
 *
 * @package App\Repositories
 */
class CategoryRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model()
    {
        return Categories::class;
    }

    /**
     * Create a base entity from the repository database model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function entity()
    {
        return $this->model;
    }
}