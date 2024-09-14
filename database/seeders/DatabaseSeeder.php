<?php

namespace Database\Seeders;

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
        \App\Models\User::create(['name' => 'Đăng Lee', 'email' => 'lhd4388@gmail.com', 'password' => '$2y$10$2rlrm/94CvaOhiu8tGvQV.1WhCC6mCwhbjrDSGxQG.kLBrf7zHnH6']);
    }
}
