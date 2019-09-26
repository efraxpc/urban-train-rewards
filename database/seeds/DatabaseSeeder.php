<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RewardsTypeTableSeeder::class);
        $this->call(RewardsTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(PrizeCategoryTableSeeder::class);
        $this->call(OffersTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(MailchipInfoSeeder::class);
        $this->call(ContactInfoSeeder::class);
    }
}
