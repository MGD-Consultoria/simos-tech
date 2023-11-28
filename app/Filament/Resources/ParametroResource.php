<?php

namespace App\Filament\Resources;

use App\Models\Parametro;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\ParametroResource\Pages;
use Filament\Tables\Columns\TextColumn;

class ParametroResource extends Resource
{
    protected static ?string $model = Parametro::class;

    //protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $recordTitleAttribute = 'nome';
    protected static ?string $label = 'parâmetro';
    protected static ?string $pluralLabel = 'Parâmetros';
    protected static ?string $navigationGroup = 'Operação';

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

                    TextInput::make('unidade_medida')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Unidade Medida')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('escala_permitida_inicial')
                        ->rules(['numeric'])
                        ->required()
                        ->numeric()
                        ->placeholder('Escala Permitida Inicial')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('escala_permitida_final')
                        ->rules(['numeric'])
                        ->required()
                        ->numeric()
                        ->placeholder('Escala Permitida Final')
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
                TextColumn::make('unidade_medida')
                    ->toggleable()
                    ->searchable(true, null, false)
                    ->limit(50),
                TextColumn::make('escala_permitida_inicial')
                    ->toggleable()
                    ->searchable(true, null, false),
                TextColumn::make('escala_permitida_final')
                    ->toggleable()
                    ->searchable(true, null, false),
            ])
            ->filters([DateRangeFilter::make('created_at')])
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListParametros::route('/'),
            'create' => Pages\CreateParametro::route('/create'),
            'view' => Pages\ViewParametro::route('/{record}'),
            'edit' => Pages\EditParametro::route('/{record}/edit'),
        ];
    }
}
