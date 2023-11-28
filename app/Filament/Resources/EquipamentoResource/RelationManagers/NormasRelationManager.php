<?php

namespace App\Filament\Resources\EquipamentoResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\RelationManagers\RelationManager;

class NormasRelationManager extends RelationManager
{
    protected static string $relationship = 'normas';

    protected static ?string $recordTitleAttribute = 'titulo';

    public function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 12])->schema([
                TextInput::make('titulo')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Titulo')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('sigla')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Sigla')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                RichEditor::make('descricao')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Descricao')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                DatePicker::make('data_vigencia')
                    ->rules(['date'])
                    ->placeholder('Data Vigencia')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('nome_maquina')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Nome Maquina')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('fabricante_maquina')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Fabricante Maquina')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('numero_serie')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Numero Serie')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('unidade_medida')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Unidade Medida')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('escala_permitida_inicial')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Escala Permitida Inicial')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('escala_permitida_final')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Escala Permitida Final')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('escala_minima_bom')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Escala Minima Bom')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('escala_maxima_bom')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Escala Maxima Bom')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('escala_minima_regular')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Escala Minima Regular')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('escala_maxima_regular')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Escala Maxima Regular')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('escala_minima_irregular')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Escala Minima Irregular')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('escala_maxima_irregular')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Escala Maxima Irregular')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),
            ]),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titulo')->limit(50),
                TextColumn::make('sigla')->limit(50),
                TextColumn::make('descricao')->limit(50),
                TextColumn::make('data_vigencia')->date(),
                TextColumn::make('nome_maquina')->limit(50),
                TextColumn::make('fabricante_maquina')->limit(
                    50
                ),
                TextColumn::make('numero_serie')->limit(50),
                TextColumn::make('unidade_medida')->limit(50),
                TextColumn::make('escala_permitida_inicial'),
                TextColumn::make('escala_permitida_final'),
                TextColumn::make('escala_minima_bom'),
                TextColumn::make('escala_maxima_bom'),
                TextColumn::make('escala_minima_regular'),
                TextColumn::make('escala_maxima_regular'),
                TextColumn::make('escala_minima_irregular'),
                TextColumn::make('escala_maxima_irregular'),
            ])
            ->filters([
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from'),
                        Forms\Components\DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(
                                    Builder $query,
                                    $date
                                ): Builder => $query->whereDate(
                                    'created_at',
                                    '>=',
                                    $date
                                )
                            )
                            ->when(
                                $data['created_until'],
                                fn(
                                    Builder $query,
                                    $date
                                ): Builder => $query->whereDate(
                                    'created_at',
                                    '<=',
                                    $date
                                )
                            );
                    }),
            ])
            ->headerActions([Tables\Actions\CreateAction::make()])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
