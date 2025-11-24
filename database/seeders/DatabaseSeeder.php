<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Site;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{

     use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++)
        {
            City::factory()
                ->has(
                    Site::factory()->count(random_int(1, 4))->has(
                        Employee::factory()->count(random_int(1, 7))))
                ->create();
        }
        

        $this->call(
            RoleSeeder::class,
        );

        // Create admin user for testing
        User::create([
            'name' => 'testadmin',
            'email' => 'test@admin.hu',
            'password' => Hash::make('testADMIN123'),
        ])->addRole(['default', 'admin']);
    }
}
