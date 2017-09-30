<?php

namespace App;

use Chrisbjr\ApiGuard\Models\Mixins\Apikeyable;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Database model: 'User'
 *
 * @property integer            $id
 * @property string             $name
 * @property string             $email
 * @property string             $language
 * @property string             $profile_image
 * @property string             $password
 * @property string             $remember_token
 * @property \Carbon\Carbon     $created_at
 * @property \Carbon\Carbon     $updated_at
 */
class User extends Authenticatable
{
    use Notifiable, HasRoles, Bannable, Apikeyable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'language', 'profile_image', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
}
