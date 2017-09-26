<?php 

namespace App\Repositories\Criteria; 

use ActivismeBE\DatabaseLayering\Repositories\Criteria\Criteria;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;

/**
 * Class SearchHelpdesk
 *
 * @package App\Repositories\Criteria
 */
class SearchHelpdesk extends Criteria 
{
    private $term;

    /**
     * SearchHelpdesk constructor.
     * 
     * @param  string $term The user given search term. 
     * @return void
     */
    public function __construct($term)
    {
        $this->term = $term;
    }

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