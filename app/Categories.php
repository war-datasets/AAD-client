<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Categories
 *
 * @package App
 */
class Categories extends Model
{
	/**
	 * Mass-assign fields for the database table.
	 *
	 * @var array
	 */
    protected $fillable = ['module', 'name'];
}
