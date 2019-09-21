<?php

use Illuminate\Database\Seeder;

class PrizeCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 30;
        $this->command->info("Creating {$count} prizes.");
        $rewards = factory(App\PrizeCategory::class, $count)->create();
        $this->command->info('Prizes Created!');
    }
}
