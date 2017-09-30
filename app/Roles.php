<?php

namespace App;

use Spatie\Permission\Models\Role as BaseModel;

/**
 * Database model 'Roles'
 */
class Roles extends BaseModel
{
    /**
     * Mass-assign field for the database table.
     *
     * @return array
     */
    protected $fillable = [];
}
