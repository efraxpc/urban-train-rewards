<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RewardsTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rewards_type')->insert([
            'name' => 'Paypal',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('rewards_type')->insert([
            'name' => 'Ebay',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('rewards_type')->insert([
            'name' => 'Amazon',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
