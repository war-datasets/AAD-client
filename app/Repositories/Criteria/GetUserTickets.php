<?php 

namespace App\Repositories\Criteria; 

use ActivismeBE\DatabaseLayering\Repositories\Criteria\Criteria;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;

/**
 * Class GetUserTickets
 *
 * @package App\Repositories\Criteria
 */
class GetUserTickets extends Criteria 
{
    /**
     * @param                       $model
     * @param RepositoryInterface   $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model;
    }
}