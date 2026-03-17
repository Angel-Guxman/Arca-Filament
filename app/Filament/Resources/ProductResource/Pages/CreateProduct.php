<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        // Extraer la imagen destacada antes de crear el producto
        $featuredImagePath = $data['featured_image'] ?? null;
        unset($data['featured_image']);

        // Crear el producto
        $record = static::getModel()::create($data);

        // Si hay imagen destacada, crearla en la tabla image_products
        if ($featuredImagePath) {
            $record->featuredImage()->create([
                'image' => "storage/" . $featuredImagePath,
                'description' => 'Imagen destacada',
                'featured' => true,
            ]);
        }

        return $record;
    }

   /*  protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Generar slug automáticamente si no existe
        if (empty($data['slug'])) {
            $data['slug'] = \Str::slug($data['name']);
        }

        return $data;
    } */
}
