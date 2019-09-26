<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_info')->insert([
            'address' => '97845 Baker st. 567
            Los Angeles - US',
            'phone_number' => '+1 (559) 727-0433',
            'mail_contact' => 'info@sparker.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
