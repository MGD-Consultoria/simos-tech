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
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;

class ManutencoesRelationManager extends RelationManager
{
    protected static string $relationship = 'manutencoes';

    protected static ?string $recordTitleAttribute = 'descricao';
    protected static ?string $title = 'Manutenções';

    protected static bool $shouldRegisterNavigation = false;

    public function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 12])->schema([
                TextInput::make('tipo_manutencao')
                    ->rules(['numeric'])
                    ->placeholder('Tipo Manutenção')
                    ->label('Tipo Manutenção')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 6,
                        'lg' => 4,
                    ]),
                Select::make('responsavel_id')
                    ->relationship('responsavel','nome')
                    ->label('Responsável')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 6,
                        'lg' => 4,
                    ]),

                TextInput::make('tecnico')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Técnico')
                    ->label('Técnico')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 6,
                        'lg' => 4,
                    ]),

                TextInput::make('contato_tecnico')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Contato Técnico')
                    ->label('Contato Técnico')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 6,
                        'lg' => 4,
                    ]),
                Forms\Components\Textarea::make('descricao')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Descrição')
                    ->label('Descrição')
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
                TextColumn::make('tipo_manutencao'),
                TextColumn::make('descricao')
                    ->label('Descrição')
                    ->searchable(true,null,false)
                    ->limit(50),
                TextColumn::make('responsavel.nome')
                    ->label('Responsável')
                    ->searchable(true,null,false)
                    ->limit(50),
                TextColumn::make('tecnico')
                    ->label('Técnico')
                    ->searchable(true,null,false)
                    ->limit(50),
                TextColumn::make('contato_tecnico')
                    ->label('Contato Técnico')
                    ->searchable(true,null,false)
                    ->limit(50),
            ])
            ->filters([
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                ->label('Registrar manutenção')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
