<?php

namespace App\Console\Commands;

use App\Repositories\KoreanCasualtyRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportKorean extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:dataset-dcas-ks-ext08';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import the NARA dataset about the first Korean war.';

    /**
     * @var KoreanCasualtyRepository
     */
    private $koreanCasualtyRepository;

    /**
     * Create a new command instance.
     *
     * @param  KoreanCasualtyRepository $koreanCasualtyRepository
     * @return void
     */
    public function __construct(KoreanCasualtyRepository $koreanCasualtyRepository)
    {
        parent::__construct();
        $this->koreanCasualtyRepository = $koreanCasualtyRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->confirm('Do you want to truncate the database table?')) {
            DB::table('korean_casualties')->delete();
            $this->info('[INFO]: The Table is empty now.');
        }

        $this->info('[INFO]: Start migrating the data.');

        $this->koreanCasualtyRepository->importData(
            'https://raw.githubusercontent.com/war-datasets/DCAS.KS.EXT08.DAT/master/sources/DCAS.KS.EXT08.DAT',
            'korean_casualties'
        );

        $this->info("[INFO]: The data has been populated.");
        $this->info("[INFO]: Cleaning up data.");

        $this->koreanCasualtyRepository->cleanUp('korean_casualties');

        $this->info("[INFO]: The cleanup is ready.");
    }
}
