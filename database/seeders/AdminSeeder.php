<?php

namespace Database\Seeders;

use App\Models\Dashboard\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'username' => 'admin',
            'email' => 'admin@estore.com',
            'name' => 'Admin',
            'password' => '$2y$10$Crk70XzCeEOG3iaeVJY3Q.nqw/838aOWQ7nXzYxWeilBoV4HYnsOC', // 12345678
            'remember_token' => null,
        ]);
    }
}
