<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class)->times(20)->make()->each(function ($user, $index) {
            if ($index == 0) {
                 $user->name = 'marvin';
                 $user->email = 'marvin@fungif.com';
            }
        });

        $users_array = $users->makeVisible(['password', 'remember_token'])->toArray();

        User::insert($users_array);
    }
}
