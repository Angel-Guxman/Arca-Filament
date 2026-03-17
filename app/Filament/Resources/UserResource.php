<?php

namespace App\Filament\Resources;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\UserResource\Pages\ListUsers;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class UserResource extends Resource
{
    protected static ?string $model = User::class;
    //icono del panel
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-users';
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





    public static function form(Schema $schema): Schema
    {//para crear y editar
        
        return $schema
            ->components([
                Section::make('Información del Usuario')
                ->description('Añade la información del Usuario.')
                ->schema([
                    TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Nombre del Usuario'),
                    TextInput::make('last_name')
                    ->required()
                    ->maxLength(255)
                    ->label('Apellido del Usuario'),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->label('Correo del Usuario'),
                    TextInput::make('password')
                    ->label('Contraseña del Usuario')
                    ->password()
                    ->required()
                    ->visibleOn('create')
                    ->minLength(5)
                    ->maxLength(255),
                        Select::make('rol')
                        ->options([
                            'customer' => 'Cliente',
                            'administrator' => 'Administrador',
                        ])
                        ->required()
                        ->label('Elige un rol'),
                    TextInput::make('phone')
                    ->required()
                    ->minLength(5)
                    ->maxLength(255)
                    ->label('Telefono'),
                    TextInput::make('first_street')
                    ->required()
                    ->maxLength(255)
                    ->minLength(2)
                    ->label('Primera calle'),
                    TextInput::make('outdoor_number')
                    ->required()
                    ->minLength(1)
                    ->maxLength(255)
                    ->label('Numero exterior'),
                    TextInput::make('interior_number')
                    ->required()
                    ->minLength(1)
                    ->maxLength(255)
                    ->label('numero interior'),
                    TextInput::make('address')
                    ->required()
                    ->minLength(5)
                    ->maxLength(255)
                    ->label('Dirección'),
                    TextInput::make('country')
                    ->required()
                    ->minLength(3)
                    ->maxLength(255)
                    ->label('Pais'),
                    TextInput::make('municipality')
                    ->required()
                    ->minLength(3)
                    ->maxLength(255)
                    ->label('Municipio'),
                    TextInput::make('state')
                    ->required()
                    ->minLength(3)
                    ->maxLength(255)
                    ->label('Estado'),
                    TextInput::make('post_code')
                    ->required()
                    ->minLength(1)
                    ->maxLength(255)
                    ->label('Codigo Postal'),
                    Textarea::make('indications')
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
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}
