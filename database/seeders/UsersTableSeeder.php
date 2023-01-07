<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory(5)->create();

        $user = User::first();
        $user->name = 'Administrator';
        $user->email = 'admin@gmail.com';
        $user->save();
    }
}
