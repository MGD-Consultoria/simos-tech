<?php

namespace App\Filament\Resources\EquipamentoResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class SensoresRelationManager extends RelationManager
{
    protected static string $relationship = 'sensores';

    protected static ?string $recordTitleAttribute = 'tipo';

    protected static bool $shouldRegisterNavigation = false;

    public function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 12])->schema([
                TextInput::make('codigo_identificacao')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Código de identificação')
                    ->label('Código de identificação')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 6,
                        'lg' => 4,
                    ]),
                TextInput::make('tipo')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Tipo')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 6,
                        'lg' => 4,
                    ]),

                TextInput::make('modelo')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Modelo')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 6,
                        'lg' => 4,
                    ]),

                DatePicker::make('data_fabricacao')
                    ->rules(['date'])
                    ->placeholder('Data Fabricação')
                    ->label('Data Fabricação')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 6,
                        'lg' => 4,
                    ]),

                TextInput::make('fabricante')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Fabricante')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 6,
                        'lg' => 4,
                    ]),

                TextInput::make('unidade_medida')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Unidade de medida')
                    ->label('Unidade de medida')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 6,
                        'lg' => 4,
                    ]),

                TextInput::make('faixa_medicao_inicial')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Faixa Medicao Inicial')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 6,
                        'lg' => 4,
                    ]),

                TextInput::make('faixa_medicao_final')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Faixa Medicao Final')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 6,
                        'lg' => 4,
                    ]),

                TextInput::make('latitude')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Latitude')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 6,
                        'lg' => 4,
                    ]),

                TextInput::make('logintude')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Logintude')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 6,
                        'lg' => 4,
                    ]),

                TextInput::make('frequencia_leitura_dados')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Frequência Leitura Dados (minutos)')
                    ->label('Frequência Leitura Dados (minutos)')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 6,
                        'lg' => 4,
                    ]),
            ]),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('codigo_identificacao')
                    ->label('Código de identificação')
                    ->searchable(true,null,false)
                    ->limit(50),
                TextColumn::make('tipo')
                    ->searchable(true,null,false)
                    ->limit(50),
                TextColumn::make('modelo')
                    ->searchable(true,null,false)
                    ->limit(50),
                TextColumn::make('fabricante')
                    ->searchable(true,null,false)
                    ->limit(50),
            ])
            ->filters([
            ])
            ->headerActions([Tables\Actions\CreateAction::make()])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
