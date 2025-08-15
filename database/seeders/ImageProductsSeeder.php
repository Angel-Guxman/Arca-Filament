<?php

namespace Database\Seeders;

use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $productsImg = [
            ['producto' => 1, 'image' => 'storage/products/co-pr1-1.png', 'description' => 'Collar de Jade Clásico en una vista completa que resalta su diseño simple y elegante.'],
            ['producto' => 1, 'image' => 'storage/products/co-pr1-2.png', 'description' => 'Detalle del colgante del Collar de Jade Clásico, mostrando su textura natural.'],
            ['producto' => 1, 'image' => 'storage/products/co-pr1-3.png', 'description' => 'Vista lateral del Collar de Jade Clásico, destacando su cierre y diseño.'],
            ['producto' => 1, 'image' => 'storage/products/co-pr1-4.png', 'description' => 'Collar de Jade Clásico mostrado en un maniquí para apreciar su longitud y caída.'],
            ['producto' => 2, 'image' => 'storage/products/co-pr2-1.png', 'description' => 'Collar de Jade con Dijes exhibiendo sus delicados detalles y acabados.'],
            ['producto' => 2, 'image' => 'storage/products/co-pr2-2.png', 'description' => 'Primer plano de los dijes del Collar de Jade, mostrando su diseño intrincado.'],
            ['producto' => 2, 'image' => 'storage/products/co-pr2-3.png', 'description' => 'Vista del cierre del Collar de Jade con Dijes, resaltando su funcionalidad.'],
            ['producto' => 2, 'image' => 'storage/products/co-pr2-4.png', 'description' => 'Collar de Jade con Dijes presentado sobre una superficie plana para destacar su diseño completo.'],
            ['producto' => 3, 'image' => 'storage/products/co-pr3-1.png', 'description' => 'Collar de Jade Elegante con una presentación frontal que resalta su sofisticación.'],
            ['producto' => 3, 'image' => 'storage/products/co-pr3-2.png', 'description' => 'Detalle del jade pulido del Collar Elegante, mostrando su acabado impecable.'],
            ['producto' => 3, 'image' => 'storage/products/co-pr3-3.png', 'description' => 'Vista superior del Collar de Jade Elegante, destacando sus proporciones.'],
            ['producto' => 3, 'image' => 'storage/products/co-pr3-4.png', 'description' => 'Collar de Jade Elegante en un maniquí, mostrando cómo se luce al usarlo.'],
            ['producto' => 4, 'image' => 'storage/products/are-pr1-1.png', 'description' => 'Aretes de Jade Redondos en una vista frontal que resalta su diseño simétrico.'],
            ['producto' => 4, 'image' => 'storage/products/are-pr1-2.png', 'description' => 'Detalle de los broches de los Aretes de Jade Redondos, mostrando su seguridad.'],
            ['producto' => 4, 'image' => 'storage/products/are-pr1-3.png', 'description' => 'Vista lateral de los Aretes de Jade Redondos, enfocándose en su estructura.'],
            ['producto' => 5, 'image' => 'storage/products/are-pr2-1.png', 'description' => 'Aretes de Jade Largos en una presentación que destaca su diseño elegante.'],
            ['producto' => 5, 'image' => 'storage/products/are-pr2-2.png', 'description' => 'Detalle de las piedras de jade en los Aretes Largos, resaltando su color vibrante.'],
            ['producto' => 5, 'image' => 'storage/products/are-pr2-3.png', 'description' => 'Vista de los Aretes Largos mostrando el diseño completo y cómo caen.'],
         ['producto' => 6, 'image' => 'storage/products/are-pr3-1.png', 'description' => 'Aretes de Jade con Plata mostrando su combinación de materiales.'],
            ['producto' => 6, 'image' => 'storage/products/are-pr3-2.png', 'description' => 'Detalle de los bordes de plata de los Aretes de Jade, resaltando el trabajo artesanal.'],
            ['producto' => 6, 'image' => 'storage/products/are-pr3-3.png', 'description' => 'Vista en conjunto de los Aretes de Jade con Plata para apreciar su diseño.'],
            ['producto' => 7, 'image' => 'storage/products/pul-pr1-1.png', 'description' => 'Pulsera de Jade Trenzada en una vista completa para destacar su diseño.'],
            ['producto' => 7, 'image' => 'storage/products/pul-pr1-2.png', 'description' => 'Detalle del trenzado de la Pulsera de Jade, mostrando su artesanía.'],
            ['producto' => 7, 'image' => 'storage/products/pul-pr1-3.png', 'description' => 'Vista de la Pulsera de Jade Trenzada en un soporte para resaltar su forma.'],
            ['producto' => 8, 'image' => 'storage/products/pul-pr2-1.png', 'description' => 'Pulsera de Jade y Cuarzo en una presentación que muestra la combinación de piedras.'],
            ['producto' => 8, 'image' => 'storage/products/pul-pr2-2.png', 'description' => 'Detalle del jade y cuarzo de la Pulsera, resaltando la textura de las piedras.'],
            ['producto' => 8, 'image' => 'storage/products/pul-pr2-3.png', 'description' => 'Vista lateral de la Pulsera de Jade y Cuarzo, destacando su diseño.'],
            ['producto' => 9, 'image' => 'storage/products/pul-pr3-1.png', 'description' => 'Pulsera de Jade Natural en una vista completa mostrando sus tonos únicos.'],
            ['producto' => 9, 'image' => 'storage/products/pul-pr3-2.png', 'description' => 'Detalle de las piedras de jade de la Pulsera Natural, resaltando su autenticidad.'],
            ['producto' => 9, 'image' => 'storage/products/pul-pr3-3.png', 'description' => 'Vista superior de la Pulsera de Jade Natural para apreciar su estructura.'],
            ['producto' => 10, 'image' => 'storage/products/pul-pr4-1.png', 'description' => 'Pulsera de Jade Minimalista con un diseño simple pero elegante.'],
            ['producto' => 10, 'image' => 'storage/products/pul-pr4-2.png', 'description' => 'Detalle del acabado de la Pulsera de Jade Minimalista, resaltando su pulido.'],
            ['producto' => 10, 'image' => 'storage/products/pul-pr4-3.png', 'description' => 'Vista en un soporte de la Pulsera de Jade Minimalista para destacar su estética.'],
        ];
        foreach ($productsImg as $key => $value) {
            $i=$key+1;
            $featured=[1,5,9,13,16,19,22,25,28,31];
                ImageProduct::create([
                    'product_id'=>$value['producto'],
                    'image'=>$value['image'],
                    'description'=>$value['description'],
                    'featured'=>in_array($i,$featured)?true:false
                ]);
        }     
    }
}
