<?php

namespace App\Filament\Resources\EmpresaResource\RelationManagers;

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
                        'md' => 6,
                        'lg' => 4,
                    ]),

                TextInput::make('categoria')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Categoria')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 6,
                        'lg' => 4,
                    ]),
                Select::make('gestor_id')
                    ->label('Gestor')
                    ->rules(['exists:funcionarios,id'])
                    ->relationship('gestor', 'nome')
                    ->searchable()
                    ->preload()
                    ->placeholder('Gestor')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 6,
                        'lg' => 4,
                    ]),

                Select::make('responsavel_id')
                    ->rules(['exists:funcionarios,id'])
                    ->label('Responsável')
                    ->relationship('responsavel', 'nome')
                    ->searchable()
                    ->preload()
                    ->placeholder('Responsavel')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 6,
                        'lg' => 4,
                    ]),

                Forms\Components\Textarea::make('descricao')
                    ->label('Descrição')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Descrição')
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
                TextColumn::make('nome')
                ->searchable(true,null,false),
                TextColumn::make('categoria')
                    ->searchable(true,null,false),
                TextColumn::make('descricao')
                    ->label('Descrição')
                    ->limit(50)
                    ->searchable(true,null,false),
                TextColumn::make('gestor.nome')
                    ->searchable(true,null,false),
                TextColumn::make('responsavel.nome')
                    ->label('Responsável')
                    ->searchable(true,null,false),
            ])
            ->filters([
                MultiSelectFilter::make('gestor_id')->relationship(
                    'gestor',
                    'nome'
                )->label('Gestor'),

                MultiSelectFilter::make('responsavel_id')->relationship(
                    'responsavel',
                    'nome'
                )->label('Responsável'),
            ])
            ->headerActions([Tables\Actions\CreateAction::make()])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
