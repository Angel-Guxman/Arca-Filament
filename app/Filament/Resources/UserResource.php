<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class UserResource extends Resource
{
    protected static ?string $model = User::class;
    //icono del panel
    protected static ?string $navigationIcon = 'heroicon-o-users';
    //nombre del panel
    protected static ?string $navigationLabel = 'Usuarios';
    //nombre de la lista,new,migajas
    protected static ?string $modelLabel = 'Usuario';
    //nombre del grupo al que pertenece en el panel
 /*    protected static ?string $navigationGroup = 'Gestión de Usuarios'; */
    //orden conforme al grupo 1 arriba 4 abajo
    protected static ?int $navigationSort = 1;
    //url
    protected static ?string $slug = 'usuarios';
    //busqueda general
    protected static ?string $recordTitleAttribute = 'name';





    public static function form(Form $form): Form
    {//para crear y editar
        
        return $form
            ->schema([
                Forms\Components\Section::make('Información del Usuario')
                ->description('Añade la información del Usuario.')
                ->schema([
                    Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Nombre del Usuario'),
                    Forms\Components\TextInput::make('last_name')
                    ->required()
                    ->maxLength(255)
                    ->label('Apellido del Usuario'),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->label('Correo del Usuario'),
                    Forms\Components\TextInput::make('password')
                    ->label('Contraseña del Usuario')
                    ->password()
                    ->required()
                    ->visibleOn('create')
                    ->minLength(5)
                    ->maxLength(255),
                        Forms\Components\Select::make('rol')
                        ->options([
                            'customer' => 'Cliente',
                            'administrator' => 'Administrador',
                        ])
                        ->required()
                        ->label('Elige un rol'),
                    Forms\Components\TextInput::make('phone')
                    ->required()
                    ->minLength(5)
                    ->maxLength(255)
                    ->label('Telefono'),
                    Forms\Components\TextInput::make('first_street')
                    ->required()
                    ->maxLength(255)
                    ->minLength(2)
                    ->label('Primera calle'),
                    Forms\Components\TextInput::make('outdoor_number')
                    ->required()
                    ->minLength(1)
                    ->maxLength(255)
                    ->label('Numero exterior'),
                    Forms\Components\TextInput::make('interior_number')
                    ->required()
                    ->minLength(1)
                    ->maxLength(255)
                    ->label('numero interior'),
                    Forms\Components\TextInput::make('address')
                    ->required()
                    ->minLength(5)
                    ->maxLength(255)
                    ->label('Dirección'),
                    Forms\Components\TextInput::make('country')
                    ->required()
                    ->minLength(3)
                    ->maxLength(255)
                    ->label('Pais'),
                    Forms\Components\TextInput::make('municipality')
                    ->required()
                    ->minLength(3)
                    ->maxLength(255)
                    ->label('Municipio'),
                    Forms\Components\TextInput::make('state')
                    ->required()
                    ->minLength(3)
                    ->maxLength(255)
                    ->label('Estado'),
                    Forms\Components\TextInput::make('post_code')
                    ->required()
                    ->minLength(1)
                    ->maxLength(255)
                    ->label('Codigo Postal'),
                    Forms\Components\Textarea::make('indications')
                    ->required()
                    ->rows(5)
                    ->minLength(1)
                    ->maxLength(255)
                    ->label('Indicaciones'),
            
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
