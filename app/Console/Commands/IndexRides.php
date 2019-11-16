<?php

namespace App\Console\Commands;

use Config;
use App\Ride;
use Illuminate\Console\Command;
use TNTSearch;
use TeamTNT\TNTSearch\Indexer\TNTIndexer;
class IndexRides extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'index:rides';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Index Rides table';

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

        $indexer = TNTSearch::createIndex('rides.index');
        $indexer->query("SELECT `id`, `status`, `request_date`, `pickup_lat`, `pickup_lng`, `pickup_location`, `dropoff_lat`, `dropoff_lng`, `dropoff_location`, `pickup_date`, `dropoff_date`, `type`, `driver_id`, `driver_name`, `driver_rating`, `driver_pic`, `car_make`, `car_model`, `car_number`, `car_year`, `car_pic`, `duration`, `duration_unit`, `distance`, `distance_unit`, `cost`, `cost_unit` FROM rides");
        $indexer->run();
    }
}
