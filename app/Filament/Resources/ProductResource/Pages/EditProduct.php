<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;


class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Cargar la imagen destacada actual
        $featuredImage = $this->record->featuredImage;
        if ($featuredImage) {
            $data['featured_image'] = $featuredImage->image;
        }

        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        // Extraer la imagen destacada antes de actualizar el producto
        $featuredImagePath = $data['featured_image'] ?? null;
        unset($data['featured_image']);

        // Actualizar el producto
        $record->update($data);

        // Manejar la imagen destacada
        if ($featuredImagePath) {
            // Actualizar o crear la imagen destacada
            $record->featuredImage()->updateOrCreate(
                ['product_id' => $record->id],
                [
                    'image' => "storage/" . $featuredImagePath,
                    'description' => 'Imagen destacada',
                    'featured' => true,
                ]
            );
        } else {
            // Si no hay imagen, eliminar la imagen destacada existente
            $record->featuredImage()->delete();
        }

        return $record;
    }

   /*  protected function mutateFormDataBeforeSave(array $data): array
    {
        // Generar slug automáticamente si ha cambiado el nombre
        if (isset($data['name']) && $data['name'] !== $this->record->name) {
            $data['slug'] = \Str::slug($data['name']);
        }

        return $data;
    } */
}
