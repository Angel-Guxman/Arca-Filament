<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fecha de inicio para los datos cronológicos
        $startDate = Carbon::now()->subMonths(6);

        $categories = Category::all();

        // Array de productos (sin el campo 'id')
        $products = [
            ['name' => 'Grúa Mecanica para Paciente', 'description' => 'Es un equipo esencial diseñado para facilitar la movilización y el traslado seguro de pacientes con movilidad reducida.', 'price' => 17499, 'stock' => 10, 'category_name' => 'Collares'],
            ['name' => 'Monitor Signos Vitales', 'description' => 'Es un dispositivo médico avanzado diseñado para la monitorización continua y precisa de los parámetros vitales del paciente.', 'price' => 39999, 'stock' => 10, 'category_name' => 'Collares'],
            ['name' => 'Mesa Puente', 'description' => 'Es un equipo versátil y esencial en el ámbito médico y quirúrgico, diseñado para proporcionar soporte y accesibilidad durante diversos procedimientos clínicos.', 'price' => 1999, 'stock' => 10, 'category_name' => 'Collares'],
            ['name' => 'Cama', 'description' => 'Diseñada para ofrecer confort y apoyo durante el descanso y la recuperación.', 'price' => 20999, 'stock' => 10, 'category_name' => 'Aretes'],
            ['name' => 'Silla de Ruedas', 'description' => 'Una silla de ruedas robusta y ligera, diseñada para facilitar la movilidad de personas con movilidad reducida.', 'price' => 15999, 'stock' => 15, 'category_name' => 'Pulseras'],
            ['name' => 'Oxímetro de Pulso', 'description' => 'Dispositivo portátil que mide la saturación de oxígeno en sangre y la frecuencia cardíaca, ideal para monitoreo en casa o en entornos clínicos.', 'price' => 4999, 'stock' => 20, 'category_name' => 'Aretes'],
            ['name' => 'Termómetro Digital', 'description' => 'Termómetro de uso médico, rápido y preciso, ideal para el monitoreo de la temperatura corporal en pacientes de todas las edades.', 'price' => 999, 'stock' => 30, 'category_name' => 'Pulseras'],
            ['name' => 'Desfibrilador Automático', 'description' => 'Dispositivo médico que analiza el ritmo cardíaco y puede administrar una descarga eléctrica para restablecer el ritmo cardíaco normal.', 'price' => 64999, 'stock' => 2, 'category_name' => 'Pulseras'],
        ];

        // Mapa de imágenes por ID
        $images = [
            1 => 'products/Anillos.png',
            2 => 'products/Anillos.png',
            3 => 'products/Aretes.png',
            4 => 'products/Aretes.png',
            5 => 'products/Anillos.png',
            6 => 'products/Aretes.png',
            7 => 'products/Anillos.png',
            8 => 'products/Aretes.png',
        ];

        foreach ($products as $index => $product) {

            $categoryId = Category::where('name', $product['category_name'])->first()->id;

            Product::create([
                'name' => $product['name'] ?? '',
                'description' => $product['description'] ?? '',
                'price' => $product['price'] ?? 0,
                'stock' => $product['stock'] ?? 0,
                'image' => $images[$index + 1] ?? null, // Asigna la imagen por índice + 1
                'category_id' => $categoryId,
                'created_at' => $startDate->copy()->addDays($index * 2),
                'updated_at' => $startDate->copy()->addDays($index * 2),
            ]);
        }
    }
}

// php artisan db:seed --class=ProductsSeeder
