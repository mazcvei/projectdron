<?php

namespace Database\Seeders;

use App\Models\Rol;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;
use Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => "Admin",
            'lastname' => "Admin",
            'email' => "admin@test.com",
            'password' => Hash::make("password"),
        ]);


        $this->call(CropTypeSeeder::class);
        $this->call(DronSeeder::class);
        $this->call(ServiceTypeSeeder::class);
        $this->call(ConfigWebSeeder::class);
    }
      
}
