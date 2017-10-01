<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent database model 'Status'
 * 
 * @property integer			$id				The primary key for the status row. 
 * @property string 			$name			The name form the status
 * @property string				$description	The description for the status
 * @property \Carbon\Carbon		$created_at 	The timestamp when the status has been created. 
 * @property \Carbon\Carbon		$updated_at		The timestamp when the status last has been updated. 
 */
class Status extends Model
{
	/**
	 * Mass-assign fields for the db table. 
	 * 
	 * @var array
	 */
	protected $fillable = ['name', 'description'];
}
