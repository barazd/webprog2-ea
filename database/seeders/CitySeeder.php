<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Site;
use App\Models\Employee;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::factory()
            ->count(10)
            ->has(
                Site::factory()->count(random_int(1, 6))->has(
                    Employee::factory()->count(random_int(1, 6))))
            ->create();
    }
}
