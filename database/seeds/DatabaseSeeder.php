<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(m_akunSeeder::class);
        $this->call(kategori_suratSeeder::class);
        $this->call(AccountSeeder::class);
        $this->call(userSeeder::class);
    }
}
