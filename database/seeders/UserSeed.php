<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'Reymar',
            'email' => 'rgpanoy@ksu.edu.ph',
            'password' => \Hash::make('password'),
        ]);
    }
}
