<?php

namespace App;

use Chrisbjr\ApiGuard\Models\Mixins\Apikeyable;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 *
 * @todo    Implement profile_image and language to the testing factory.
 * @package App
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
