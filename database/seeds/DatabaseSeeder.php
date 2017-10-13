<?php

use App\User;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ask for db migration refresh, default is no.
        if ($this->command->confirm('Do you wish to refresh migration before seeding, it will clear all old data?')) {
            // Call the php artisan migrate:refresh
            $this->command->call('migrate:refresh');
            $this->command->warn('Data cleared, starting from blank database.');
        }

        $adminRole  = factory(App\Roles::class)->create(['name' => 'admin']);
        $user       = factory(App\User::class)->create();

        User::find($user->id)->assignRole($adminRole->name);

        $this->command->info("User email: {$user->email}");
        $this->command->info("User password: secret");
        $this->command->info('user is assigned with the admin role.');
      
        // Run other seeders.
        $this->call(SeedServicesTable::class);
        $this->call(SeedRanksTable::class);
        $this->call(SeedPayGradeTable::class);
    }
}
