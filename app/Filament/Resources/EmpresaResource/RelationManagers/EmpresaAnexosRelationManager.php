<?php

namespace App\Filament\Resources\EmpresaResource\RelationManagers;

use App\Enums\TipoEmpresaAnexo;
use App\Models\Cidade;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Get;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\RelationManager;
use Illuminate\Database\Eloquent\Model;

class EmpresaAnexosRelationManager extends RelationManager
{
    protected static string $relationship = 'empresaAnexos';

    protected static ?string $title = 'Anexos';
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
                Select::make('tipo')
                    ->placeholder('Tipo')
                    ->options(TipoEmpresaAnexo::toArray())
                    ->live()
                    ->columnSpan([
                        'default' => 12,
                        'md' => 6,
                        'lg' => 4,
                    ]),
                Forms\Components\FileUpload::make('arquivo')
                    ->openable()
                    ->downloadable()
                    ->placeholder('Link')
                    ->visible(function (Get $get): bool {
                        if ($get('tipo') == TipoEmpresaAnexo::Arquivo()) {
                            return true;
                        }
                        return false;
                    })
                    ->disabled(function (Get $get): bool {
                        if ($get('tipo') != TipoEmpresaAnexo::Arquivo()) {
                            return true;
                        }
                        return false;
                    })
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),
                TextInput::make('link')
                    ->prefix('http://')
                    ->visible(function (Get $get): bool {
                        if ($get('tipo') == TipoEmpresaAnexo::Link()) {
                            return true;
                        }
                        return false;
                    })
                    ->disabled(function (Get $get): bool {
                        if ($get('tipo') != TipoEmpresaAnexo::Link()) {
                            return true;
                        }
                        return false;
                    })
                    ->rules(['max:255', 'string'])
                    ->placeholder('Link')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),
                Forms\Components\Textarea::make('descricao')
                    ->rules(['max:255', 'string'])
                    ->placeholder('Descricao')
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
                    ->searchable(true, null, false),
                TextColumn::make('descricao')
                    ->limit(50)
                    ->searchable(true, null, false),
                TextColumn::make('tipo')
                    ->searchable(true, null, false),
            ])
            ->filters([
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }
}
