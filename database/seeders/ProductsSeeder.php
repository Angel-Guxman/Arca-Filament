<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        $startDate = Carbon::now()->subMonths(6);

        // Define los productos con sus respectivas imágenes
        $products = [
            ['id' => 1, 'name' => 'Grúa Mecánica para Paciente', 'description' => 'Dispositivo para levantar y mover pacientes.', 'price' => 17499, 'image' => '1.png'],
            ['id' => 2, 'name' => 'Monitor de Signos Vitales', 'description' => 'Equipo de monitoreo de signos vitales.', 'price' => 39999, 'image' => '2.png'],
            ['id' => 3, 'name' => 'Cama Hospitalaria Eléctrica', 'description' => 'Cama ajustable para pacientes hospitalizados.', 'price' => 29999, 'image' => '1.png'],
            ['id' => 4, 'name' => 'Silla de Ruedas Eléctrica', 'description' => 'Silla de ruedas con motor eléctrico.', 'price' => 25999, 'image' => '2.png'],
            ['id' => 5, 'name' => 'Desfibrilador Automático', 'description' => 'Desfibrilador externo automático para emergencias.', 'price' => 14999, 'image' => '1.png'],
            ['id' => 6, 'name' => 'Equipo de Ultrasonido Portátil', 'description' => 'Ultrasonido portátil para diagnósticos.', 'price' => 54999, 'image' => '2.png'],
            ['id' => 7, 'name' => 'Bomba de Infusión', 'description' => 'Dispositivo médico para administración de fluidos.', 'price' => 9999, 'image' => '1.png'],
            ['id' => 8, 'name' => 'Electrocardiógrafo', 'description' => 'Equipo para registrar la actividad eléctrica del corazón.', 'price' => 12999, 'image' => '2.png'],
            ['id' => 9, 'name' => 'Oxímetro de Pulso', 'description' => 'Medidor portátil de la saturación de oxígeno en sangre.', 'price' => 499, 'image' => '1.png'],
            ['id' => 10, 'name' => 'Resucitador Manual', 'description' => 'Bolsa de reanimación manual para emergencias.', 'price' => 1999, 'image' => '2.png'],
        ];
        

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['id' => $product['id']],
                [
                    'name' => $product['name'],
                    'description' => $product['description'],
                    'price' => $product['price'],
                    'created_at' => $startDate->copy(),
                    'updated_at' => $startDate->copy(),
                ]
            );
        }
    }
}
