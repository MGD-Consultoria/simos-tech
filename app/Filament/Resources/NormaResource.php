<?php

namespace App\Filament\Resources;

use App\Models\Norma;
use Filament\Forms\Components\Textarea;
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
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\NormaResource\Pages;
use Filament\Tables\Columns\TextColumn;

class NormaResource extends Resource
{
    protected static ?string $model = Norma::class;

    //protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Gestão Operacional';
    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $recordTitleAttribute = 'titulo';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Informações Gerais')->schema([
                Grid::make(['default' => 12])->schema([
                    TextInput::make('titulo')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Título')
                        ->label('Título')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('sigla')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Sigla/ISO')
                        ->label('Sigla/ISO')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),
                    DatePicker::make('data_vigencia')
                        ->rules(['date'])
                        ->nullable()
                        ->placeholder('Data Vigência')
                        ->label('Data Vigência')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('revisao')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Revisão')
                        ->label('Revisão')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),
                    TextInput::make('orgao_regulador')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Orgão Regulador')
                        ->label('Orgão Regulador')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    Textarea::make('descricao')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Descrição')
                        ->label('Descrição')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),
                ]),
            ]),
            Section::make('Escalas')->schema([
                Grid::make(['default' => 12])->schema([
                    TextInput::make('unidade_medida')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Unidade de Medida')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),
                    TextInput::make('escala_permitida_inicial')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Escala Permitida Inicial')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('escala_permitida_final')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Escala Permitida Final')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('escala_minima_bom')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Escala Mínima Bom')
                        ->label('Escala Mínima Bom')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('escala_maxima_bom')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Escala Máxima Bom')
                        ->label('Escala Máxima Bom')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('escala_minima_regular')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Escala Mínima Regular')
                        ->label('Escala Mínima Regular')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('escala_maxima_regular')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Escala Máxima Regular')
                        ->label('Escala Máxima Regular')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('escala_minima_irregular')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Escala Mínima Irregular')
                        ->label('Escala Mínima Irregular')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('escala_maxima_irregular')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Escala Máxima Irregular')
                        ->label('Escala Máxima Irregular')
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
                TextColumn::make('titulo')
                    ->toggleable()
                    ->searchable(true, null, false)
                    ->limit(50),
                TextColumn::make('sigla')
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
            NormaResource\RelationManagers\EquipamentosRelationManager::class,
            NormaResource\RelationManagers\ParametrosRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNormas::route('/'),
            'create' => Pages\CreateNorma::route('/create'),
            'edit' => Pages\EditNorma::route('/{record}/edit'),
        ];
    }
}
