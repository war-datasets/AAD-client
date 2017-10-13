<?php

use App\Categories;
use Illuminate\Database\Seeder;

/**
 * Class HelpdeskCategorySeeder
 */
class HelpdeskCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::create(['name' => 'API', 'module' => 'helpdesk']);
        Categories::create(['name' => 'Feedback', 'module' => 'helpdesk']);
        Categories::create(['name' => 'Fout in de applicatie', 'module' => 'helpdesk']);
    }
}
