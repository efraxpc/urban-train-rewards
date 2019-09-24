<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MailchipInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mailchip_info')->insert([
            'campaing_id' => '4687949fd0',
            'api_key' => '907c15372095c293ffeda60c9f2c42ca-us20',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}