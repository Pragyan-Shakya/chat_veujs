<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(\App\User::class, 10)->create();

        \App\User::firstOrCreate([
            'name' => 'Pragyan',
            'email' => 'pragyan7shakya@gmail.com',
            'password' => bcrypt('Pragyan'),
        ]);
    }
}
