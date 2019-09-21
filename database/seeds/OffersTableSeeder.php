<?php

use Illuminate\Database\Seeder;

class OffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 100;
        $this->command->info("Creating {$count} offers.");
        $rewards = factory(App\Offer::class, $count)->create();
        $this->command->info('Offers Created!');
    }
}
