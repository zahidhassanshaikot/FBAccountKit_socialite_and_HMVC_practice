<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use Customer\Models\Customer as CS;

class Customer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        CS::create([
            'name' => Str::random(10),
            // 'email' => Str::random(10),
            // 'password' => bcrypt('123456')
            
        ]);
    }
}