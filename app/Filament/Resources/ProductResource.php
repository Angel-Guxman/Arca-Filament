<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;


    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Productos';
    //nombre de la lista,new,migajas
    protected static ?string $modelLabel = 'Producto';

    public static function form(Schema $schema): Schema
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('price')
                    ->rule('regex:/^\d+(\.\d{1,2})?$/')
                    ->step(0.01)
                    ->required()
                    ->numeric()
                    ->prefix('MXN'),
                Forms\Components\TextInput::make('stock')
                    ->required()
                    ->numeric(),
                Forms\Components\FileUpload::make('featured_image')
                    ->image()
                    ->directory('products')
                    ->label('Imagen destacada')
                    ->live()
                    ->afterStateUpdated(function ($state, $set) {
                        // Aquí puedes agregar lógica adicional si necesitas
                    }),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\Checkbox::make('featured')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('FeaturedImageUrl')
                    ->label('Imagen destacada'),
                Tables\Columns\TextColumn::make('stock')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->prefix('MXN ')
                    ->formatStateUsing(fn($state) => number_format($state, 2, '.', ','))
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name'),
                Tables\Columns\IconColumn::make('featured')
                    ->boolean(),
                Tables\Columns\TextColumn::make('slug'),
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
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
