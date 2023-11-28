<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EquipamentoCategoriaResource\Pages;
use App\Filament\Resources\EquipamentoCategoriaResource\RelationManagers;
use App\Models\EquipamentoCategoria;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EquipamentoCategoriaResource extends Resource
{
    protected static ?string $model = EquipamentoCategoria::class;
    protected static bool $shouldRegisterNavigation = false;

    //protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Administração';
    protected static ?string $label = 'categoria';
    protected static ?string $pluralLabel = 'Equipamento Categorias';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make()->schema([
                Grid::make(['default' => 12])->schema([
                    TextInput::make('nome')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Nome')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('60s')
            ->columns([
                TextColumn::make('nome')
                    ->toggleable()
                    ->searchable(true, null, false)
                    ->limit(50),
            ])
            ->filters([

            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                CreateAction::make(),
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
            'index' => Pages\ListEquipamentoCategorias::route('/'),
            'create' => Pages\CreateEquipamentoCategoria::route('/create'),
            'edit' => Pages\EditEquipamentoCategoria::route('/{record}/edit'),
        ];
    }
}
