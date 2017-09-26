<?php

namespace App\Console\Commands;

use App\Repositories\VietnamCasualtyRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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
     * @var VietnamCasualtyRepository
     */
    private $vietnamCasualtyRepository;

    /**
     * Create a new command instance.
     *
     * @param  VietnamCasualtyRepository $vietnamCasualtyRepository
     * @return void
     */
    public function __construct(VietnamCasualtyRepository $vietnamCasualtyRepository)
    {
        parent::__construct();
        $this->vietnamCasualtyRepository = $vietnamCasualtyRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->confirm('Do you want to truncate the database table?')) {
            DB::table('vietnam_casualties')->delete();
            $this->info('[INFO]: The Table is empty now.');
        }

        $this->info('[INFO]: Start migrating the data.');

        $this->vietnamCasualtyRepository->importData(
            'https://raw.githubusercontent.com/war-datasets/DCAS.VN.EXT08.DAT/master/sources/DCAS.VN.EXT08.DAT',
            'vietnam_casualties'
        );

        $this->info("[INFO]: The data has been populated.");
        $this->info("[INFO]: Cleaning up data.");

        $this->vietnamCasualtyRepository->cleanUp('vietnam_casualties');

        $this->info("[INFO]: The cleanup is ready.");
    }
}
