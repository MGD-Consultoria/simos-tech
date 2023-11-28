<?php

namespace App\Filament\Resources\NormaResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class EquipamentosRelationManager extends RelationManager
{
    protected static string $relationship = 'equipamentos';

    protected static ?string $recordTitleAttribute = 'numero_serie';

    public function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 12])->schema([
                TextInput::make('numero_serie')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Numero Serie')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('nome')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Nome')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('categoria')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Categoria')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('fabricante')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Fabricante')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('ano_fabricacao')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Ano Fabricacao')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('capacidade_desempenho')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Capacidade Desempenho')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('condicao_atual')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Condicao Atual')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                RichEditor::make('observacao')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Observacao')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                DatePicker::make('data_compra')
                    ->rules(['date'])
                    ->placeholder('Data Compra')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                DatePicker::make('data_instalacao')
                    ->rules(['date'])
                    ->placeholder('Data Instalacao')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                DatePicker::make('ultima_manutencao')
                    ->rules(['date'])
                    ->placeholder('Ultima Manutencao')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('periodicidade_manutencao')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Periodicidade Manutencao')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('garantia')
                    ->rules(['numeric'])
                    ->numeric()
                    ->placeholder('Garantia')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('localizacao_setor')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Localizacao Setor')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('coordenadas')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Coordenadas')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Select::make('responsavel_id')
                    ->rules(['exists:funcionarios,id'])
                    ->relationship('responsavel', 'nome')
                    ->searchable()
                    ->placeholder('Responsavel')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                Select::make('fornecedor_id')
                    ->rules(['exists:fornecedores,id'])
                    ->relationship('fornecedor', 'tipo')
                    ->searchable()
                    ->placeholder('Fornecedor')
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
                TextColumn::make('id')
                    ->label('Código')
                    ->searchable(true,null,false),
                TextColumn::make('nome')
                    ->searchable(true,null,false)
                    ->limit(50),
                TextColumn::make('numero_serie')
                    ->searchable(true,null,false)
                    ->limit(50),
                TextColumn::make('fabricante')
                    ->searchable(true,null,false)
                    ->limit(50),
            ])
            ->filters([
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->preloadRecordSelect()
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DetachBulkAction::make()
            ]);
    }
}
