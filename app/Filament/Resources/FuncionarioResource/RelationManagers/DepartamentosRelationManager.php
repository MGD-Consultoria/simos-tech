<?php

namespace App\Filament\Resources\FuncionarioResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class DepartamentosRelationManager extends RelationManager
{
    protected static string $relationship = 'departamentos';

    protected static ?string $recordTitleAttribute = 'nome';

    public function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 12])->schema([
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

                TextInput::make('descricao')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Descricao')
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

                Select::make('empresa_id')
                    ->rules(['exists:empresas,id'])
                    ->relationship('empresa', 'nome_fantasia')
                    ->searchable()
                    ->placeholder('Empresa')
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
                TextColumn::make('nome')->limit(50),
                TextColumn::make('categoria')->limit(50),
                TextColumn::make('descricao')->limit(50),
                TextColumn::make('gestor.nome')->limit(50),
                TextColumn::make('responsavel.nome')->limit(50),
                TextColumn::make('empresa.nome_fantasia')->limit(
                    50
                ),
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

                MultiSelectFilter::make('gestor_id')->relationship(
                    'gestor',
                    'nome'
                ),

                MultiSelectFilter::make('responsavel_id')->relationship(
                    'responsavel',
                    'nome'
                ),

                MultiSelectFilter::make('empresa_id')->relationship(
                    'empresa',
                    'nome_fantasia'
                ),
            ])
            ->headerActions([Tables\Actions\CreateAction::make()])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
