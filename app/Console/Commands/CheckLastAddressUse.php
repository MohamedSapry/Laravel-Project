<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Commands\CheckLastAddressUse;
use App\Jobs\CheckAddressDataJob;
class CheckLastAddressUse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'address_date:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'checking the expiration of user address';

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
     * 
     */
    public function handle()
    {
        CheckAddressDataJob::dispatch();
    }
}
