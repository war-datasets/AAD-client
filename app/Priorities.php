<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent database model 'Priorities'
 *
 * @property integer            $id             The primary key from the database table.
 * @property string             $name
 * @property string             $description
 * @property \Carbon\Carbon     $created_at
 * @property \Carbon\Carbon     $updated_at
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
