<?php

use App\Services;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedServicesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = DB::table('services');
        $table->delete();

        Services::create(['code' => 'A', 'name' => 'Army']);
        Services::create(['code' => 'C', 'name' => 'Coast Guard']);
        Services::create(['code' => 'D', 'name' => 'Defense organizations']);
        Services::create(['code' => 'F', 'name' => 'Air Force']);
        Services::create(['code' => 'H', 'name' => 'Public Health Service']);
        Services::create(['code' => 'M', 'name' => 'Marine Corps']);
        Services::create(['code' => 'N', 'name' => 'Navy']);
        Services::create(['code' => 'O', 'name' => 'NOAA']);
        Services::create(['code' => 'R', 'name' => 'Non-defense organizations']);
    }
}
