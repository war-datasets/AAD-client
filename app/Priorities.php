<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent database model 'Priorities'
 *
 * @property integer            $id             The primary key from the database table.
 * @property string             $name			The name for the priority label.
 * @property string             $description	The discription of the priority label. 
 * @property \Carbon\Carbon     $created_at		The timestamp when the priority label has been created. 
 * @property \Carbon\Carbon     $updated_at		The timestamp when the label has been updated.
 */
class Priorities extends Model
{
    /**
     * Mass-assign fields for the database table.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];
}
