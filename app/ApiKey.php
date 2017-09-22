<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ApiKey
 *
 * @package App
 */
class ApiKey extends \Chrisbjr\ApiGuard\Models\ApiKey
{
    /**
     * Mass-assign fields for the database table.
     * 
     * @var array
     */
    protected $fillable = ['key', 'apikeyable_id', 'apikeyable_type', 'last_ip_address', 'service', 'last_used_at'];
}
