<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Seed the tags table
     */
    public function run()
    {
        User::truncate();

        factory(User::class, 1)->create();
    }
}