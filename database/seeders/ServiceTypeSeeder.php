<?php

namespace Database\Seeders;

use App\Models\ServiceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['title' => 'Sólido', 'description' => '', 'image' => ''],
            ['title' => 'Herbicida', 'description' => 'En nuestro servicio de aplicación de herbicidas con drones, nos encargamos de que tus cultivos estén libres de malezas de una manera eficiente y precisa. Utilizamos drones equipados con tecnología de última generación para aplicar cualquier tipo de fitosanitarios, ya sean herbicidas, insecticidas o abonos. Lo mejor de todo es que lo hacemos de forma controlada, minimizando el desperdicio de productos y reduciendo el impacto ambiental. Nos adaptamos a las necesidades de tu terreno, ya sea grande o pequeño, y garantizamos una cobertura uniforme en cada rincón. Además, al usar drones, evitamos el pisoteo de cultivos y ahorramos tiempo en comparación con los métodos tradicionales. Confía en nosotros para mantener tus plantas sanas y tus suelos libres de malezas, ¡sin complicaciones!', 'image' => ''],
            [
                'title' => 'Fungicida',
                'description' => 'Con nuestro servicio de aplicación de fungicidas, te ayudamos a proteger tus cultivos de hongos y enfermedades que puedan afectar su crecimiento y rendimiento. Utilizamos drones especializados para distribuir los fungicidas de manera precisa y uniforme, asegurando que cada planta reciba la dosis adecuada. Este método no solo es rápido, sino que también es mucho más eficiente que las aplicaciones manuales o con maquinaria pesada.

Nos preocupamos por la salud de tus cultivos y por el medio ambiente, por eso optimizamos el uso de productos y reducimos el riesgo de contaminación. Déjanos encargarnos de la protección de tus plantas, ¡para que tú solo te preocupes por verlas crecer sanas y fuertes!',
                'image' => ''
            ],
            [
                'title' => 'Multiespectral',
                'description' => 'Permite supervisar y analizar cada centímetro de cada campo. Reduce en gran medida el tiempo que se pasa caminando por el campo. Gracias a las imágenes de alta resolución, la vista aérea del campo permite ampliar las zonas de interés sin perder claridad, lo que resulta útil para la identificación inmediata y el etiquetado GPS de:
Poblaciones de malas hierbas
Escaso crecimiento de la cosecha
Daños bióticos
Daños abióticos
Estrés hídrico o fallo del sistema de riego.
El uso de la tecnología de detección multiespectral permite la identificación temprana de posibles problemas en los cultivos. Podemos exportar los datos procesados de los drones en una variedad de formatos de archivo para su integración directa con las herramientas de software existentes. Disponemos de una solución de drones RTK para una mayor precisión de los datos y la colaboración con los sistemas actuales. Realizar recuentos precisos de ganado u otros animales.',
                'image' => ''
            ],
            ['title' => 'Multiespectral+herbicida selectivo', 'description' => '', 'image' => ''],
            ['title' => 'Multiespectral+sólido selectivo', 'description' => '', 'image' => ''],
            ['title' => 'Diagnóstico con multiespectral', 'description' => '', 'image' => ''],
            ['title' => 'Sombreado de invernadero ', 'description' => '', 'image' => ''],
        ];

        foreach($services as $service){
            ServiceType::create([
                'title'=>$service['title'],
                'description'=>$service['description'],
                'image'=>$service['image'],
            ]);
        }
    }
}
