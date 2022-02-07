<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Address;
use Carbon\Carbon;


class CheckAddressDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        Address::chunk(100, function ($addresses){
            $current = Carbon::now();
            foreach($addresses as $address){
                $last_use = Carbon::parse($address->last_use_at);    
                $diff = $current->diffInDays($last_use);    
                if($diff > 1 and $address->defult_address == false){
                    $address->delete();
                }
            }
        });
    }
}
