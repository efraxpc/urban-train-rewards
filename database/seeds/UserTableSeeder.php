<?php

use Illuminate\Database\Seeder;

use App\User;

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
        $user_seed = factory(App\User::class, $count)->create();

        $user = User::find(1);
        $user->refferal = $user->username;
        $user->save();

        $this->command->info('User Created!');
    }
}
