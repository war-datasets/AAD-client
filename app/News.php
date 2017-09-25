<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 *
 * @package App
 */
class News extends Model
{
    /**
     * Mass-assgin fields for the database table.
     *
     * @var array
     */
    protected $fillable = ['author_id', 'image_path', 'title', 'text', 'author_id'];

    /**
     * Get the author information through the data relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get the categories for a news message. Through the relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Categories::class)->withTimestamps();
    }
}
