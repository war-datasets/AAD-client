<?php 

namespace App\Repositories;

use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use App\News;

/**
 * Class NewsRepository
 *
 * @package App\Repositories
 */
class NewsRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model()
    {
        return News::class;
    }

    /**
     * Delete the article image out of the system.
     *
     * @param  string $imagePath The path in the system to the article image.
     * @return bool
     */
    public function deleteImage($imagePath)
    {
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
}