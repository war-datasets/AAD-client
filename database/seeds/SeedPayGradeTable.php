<?php

use App\PayGrades;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedPayGradeTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = DB::table('pay_grades');
        $table->delete();

        // PayGrades::create(['code' => '', 'group_name' => '']);
        PayGrades::create(['code' => 'C00', 'group_name' => 'Officer']);
        PayGrades::create(['code' => 'E01', 'group_name' => 'E1-E4']);
        PayGrades::create(['code' => 'E02', 'group_name' => 'E1-E4']);
        PayGrades::create(['code' => 'E03', 'group_name' => 'E1-E4']);
        PayGrades::create(['code' => 'E04', 'group_name' => 'E1-E4']);
        PayGrades::create(['code' => 'E05', 'group_name' => 'E5-E9']);
        PayGrades::create(['code' => 'E06', 'group_name' => 'E5-E9']);
        PayGrades::create(['code' => 'E07', 'group_name' => 'E5-E9']);
        PayGrades::create(['code' => 'E08', 'group_name' => 'E5-E9']);
        PayGrades::create(['code' => 'E09', 'group_name' => 'E5-E9']);
        PayGrades::create(['code' => 'O01', 'group_name' => 'Officer']);
        PayGrades::create(['code' => 'O02', 'group_name' => 'Officer']);
        PayGrades::create(['code' => 'O03', 'group_name' => 'Officer']);
        PayGrades::create(['code' => 'O04', 'group_name' => 'Officer']);
        PayGrades::create(['code' => 'O05', 'group_name' => 'Officer']);
        PayGrades::create(['code' => 'O06', 'group_name' => 'Officer']);
        PayGrades::create(['code' => 'O07', 'group_name' => 'Officer']);
        PayGrades::create(['code' => 'O08', 'group_name' => 'Officer']);
        PayGrades::create(['code' => 'O09', 'group_name' => 'Officer']);
        PayGrades::create(['code' => 'O10', 'group_name' => 'Officer']);
        PayGrades::create(['code' => 'O11', 'group_name' => 'Officer']);
        PayGrades::create(['code' => 'W01', 'group_name' => 'Officer']);
        PayGrades::create(['code' => 'W02', 'group_name' => 'Officer']);
        PayGrades::create(['code' => 'W03', 'group_name' => 'Officer']);
        PayGrades::create(['code' => 'W04', 'group_name' => 'Officer']);
        PayGrades::create(['code' => 'W05', 'group_name' => 'Officer']);
    }
}
