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
    protected $fillable = ['author_id', 'title', 'message'];
}
