<?php

namespace Database\Seeders;

use App\Models\ConfigWeb;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigWebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ConfigWeb::create([
            'logo' => 'logo_white.jpg',
            'email_contact' => 'info@projectdron.com',
            'facebook' => 'https://www.facebook.com/profile.php?id=61561086305186',
            'instagram' => 'https://www.instagram.com/projectdron_/'
        ]);
    }
}
