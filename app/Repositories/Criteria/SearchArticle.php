<?php 

namespace App\Repositories\Criteria; 

use ActivismeBE\DatabaseLayering\Repositories\Criteria\Criteria;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;

/**
 * Class SearchesSearchArticle
 *
 * @package App\Repositories\Criteria
 */
class SearchArticle extends Criteria
{
    private $searchTerm; /** @var string $searchTerm */

    /**
     * SearchArticle constructor.
     *
     * @param  string $searchTerm.The user given term in the search box.
     * @return void
     */
    public function __construct($searchTerm)
    {
        $this->searchTerm = $searchTerm;
    }

    /**
     * @param                       $model
     * @param RepositoryInterface   $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->where('title', 'LIKE', "%$this->searchTerm%")
            ->orWhere('text', 'LIKE', "%$this->searchTerm%");

        return $model;
    }
}