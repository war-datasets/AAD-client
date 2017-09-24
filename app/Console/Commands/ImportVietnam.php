<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportVietnam extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:dataset-dcas-vn-ext08';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import the NARA dataset about the Vietnam war.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('[TODO]: Write out import command.');
    }
}
