<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // A két alapértelmezett szerepkör
        User::create([
            'slug' => 'default',
            'name' => 'Regisztrált vendég'
        ]);
        User::create([
            'slug' => 'admin',
            'name' => 'Adminisztrátor'
        ]);
    }
}
