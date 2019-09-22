<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 1;
        $this->command->info("Creating {$count} user.");
        $rewards = factory(App\User::class, $count)->create();
        $this->command->info('User Created!');
    }
}
