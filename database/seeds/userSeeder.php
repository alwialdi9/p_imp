<?php

use Illuminate\Database\Seeder;
use App\User;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Admin',
            'email' => 'admin@imp.com',
            'telepon' => '02175818524',
            'password' => Hash::make('1234'),
            'level' => 'admin',
        ]);

        User::insert([
            'name' => 'Operator',
            'email' => 'operator@imp.com',
            'telepon' => '02175818524',
            'password' => Hash::make('1234'),
            'level' => 'operator',
        ]);
    }
}
