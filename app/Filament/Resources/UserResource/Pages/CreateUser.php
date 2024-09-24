<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
    protected function getCreatedNotificationTitle(): ?string
{
    return 'Usuario creado con éxito';
}

protected function handleRecordCreation(array $data): Model
{
   $user= static::getModel()::create($data);
   $user->assignRole($user->rol);
   return $user;
}
}
