<?php

namespace Database\Seeders;

use App\Models\Dron;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DronSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $drones = [
            ['model' => 'PHANTOM 4 PRO', 'registration_number' => '523513B', 'image' => ''],
            ['model' => 'INSPIRE', 'registration_number' => '5738346T', 'image' => ''],
            ['model' => 'PHANTOM 3 ADVANCED', 'registration_number' => '5735743Y', 'image' => ''],
            ['model' => 'DISCO PARROT', 'registration_number' => '5126252P', 'image' => ''],
        ];
        foreach($drones as $dron){
            Dron::create([
                'model'=>$dron['model'],
                'registration_number'=>$dron['registration_number'],
                'image'=>$dron['image'],
            ]);
        }
       
    }
}
