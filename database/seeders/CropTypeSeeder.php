<?php

namespace Database\Seeders;

use App\Models\CropType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CropTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $crops = [
            "Olivo",
            "Cereales",
            "Vid",
            "Frutas",
            "Cítricos",
            "Fresas",
            "Hortalizas",
            "Legumbres",
            "Frutos secos",
            "Arroz",
            "Otros"
        ];

        foreach ($crops as $crop){
            CropType::create([
                'name' => $crop,
            ]);
        }
    }
}
