<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Spatie\Permission\Models\Role;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Create a normal user in the testing system.
     *
     * @return mixed
     */
    public function createUser()
    {
        $user = factory(User::class)->create();
        $role = Role::create(['name' => 'user']);

        return User::find($user->id)->assignRole($role->name);
    }

    /**
     * Create a admin user in the testing system.
     *
     * @return mixed
     */
    public function createAdmin()
    {
        $user = factory(User::class)->create();
        $role = Role::create(['name' => 'admin']);

        return User::find($user->id)->assignRole($role->name);
    }

    /**
     * Create a blocked user in the testing system.
     *
     * @return mixed
     */
    public function createBlockedUser()
    {
        $user = factory(User::class)->create();
        $user->ban();

        return $user;
    }
}
