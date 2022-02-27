<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Bouncer;
use Illuminate\Support\Facades\DB;

class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $admin = Bouncer::role()->firstOrCreate([
            'name' => 'admin',
            'title' => 'Administrator',
        ]);
        
        $createAddress = Bouncer::ability()->firstOrCreate([
            'name' => 'create-address',
            'title' => 'Create Address',
        ]);

        $createAddress = Bouncer::ability()->firstOrCreate([
            'name' => 'view-addresses',
            'title' => 'View Addresses',
        ]);
        $user = User::where('name', "test3")->first();
        $user->assign('admin');
    }
}
