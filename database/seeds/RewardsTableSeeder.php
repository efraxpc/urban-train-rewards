<?php

use Illuminate\Database\Seeder;
class RewardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 100;
        $this->command->info("Creating {$count} rewards.");
        $genres = factory(App\Reward::class, $count)->create();
        $this->command->info('Rewards Created!');
    }
}