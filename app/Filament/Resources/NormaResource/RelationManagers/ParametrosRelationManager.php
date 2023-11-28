<?php

namespace App\Filament\Resources\NormaResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\RelationManagers\RelationManager;

class ParametrosRelationManager extends RelationManager
{
    protected static string $relationship = 'parametros';

    protected static ?string $recordTitleAttribute = 'nome';
    protected static ?string $title = 'Parâmetros';

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
            ]),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome')
                    ->limit(50),
                TextColumn::make('unidade_medida')
                    ->label('Unidade de medida')
                    ->limit(50),
                TextColumn::make('escala_permitida_inicial')
                    ->label('Escala permitida inicial'),
                TextColumn::make('escala_permitida_final')
                    ->label('Escala permitida final'),
            ])
            ->filters([
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->preloadRecordSelect()
            ])
            ->actions([
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DetachBulkAction::make()
            ]);
    }
}
