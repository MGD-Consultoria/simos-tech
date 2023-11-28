<?php

namespace App\Filament\Resources;

use App\Models\Departamento;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\DepartamentoResource\Pages;
use Filament\Tables\Columns\TextColumn;

class DepartamentoResource extends Resource
{
    protected static ?string $model = Departamento::class;

    //protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Configurações';
    protected static ?string $recordTitleAttribute = 'nome';

    protected static bool $shouldRegisterNavigation =false;

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

                    TextInput::make('categoria')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Categoria')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('descricao')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Descricao')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    Select::make('gestor_id')
                        ->rules(['exists:funcionarios,id'])
                        ->required()
                        ->relationship('gestor', 'nome')
                        ->searchable()
                        ->placeholder('Gestor')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    Select::make('responsavel_id')
                        ->rules(['exists:funcionarios,id'])
                        ->required()
                        ->relationship('responsavel', 'nome')
                        ->searchable()
                        ->placeholder('Responsavel')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    Select::make('empresa_id')
                        ->rules(['exists:empresas,id'])
                        ->required()
                        ->relationship('empresa', 'nome_fantasia')
                        ->searchable()
                        ->placeholder('Empresa')
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
                    ->searchable(true, null, true)
                    ->limit(50),
                TextColumn::make('categoria')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                TextColumn::make('descricao')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                TextColumn::make('gestor.nome')
                    ->toggleable()
                    ->limit(50),
                TextColumn::make('responsavel.nome')
                    ->toggleable()
                    ->limit(50),
                TextColumn::make('empresa.nome_fantasia')
                    ->toggleable()
                    ->limit(50),
            ])
            ->filters([
                DateRangeFilter::make('created_at'),

                SelectFilter::make('gestor_id')
                    ->relationship('gestor', 'nome')
                    ->indicator('Funcionario')
                    ->multiple()
                    ->label('Funcionario'),

                SelectFilter::make('responsavel_id')
                    ->relationship('responsavel', 'nome')
                    ->indicator('Funcionario')
                    ->multiple()
                    ->label('Funcionario'),

                SelectFilter::make('empresa_id')
                    ->relationship('empresa', 'nome_fantasia')
                    ->indicator('Empresa')
                    ->multiple()
                    ->label('Empresa'),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDepartamentos::route('/'),
            'create' => Pages\CreateDepartamento::route('/create'),
            'view' => Pages\ViewDepartamento::route('/{record}'),
            'edit' => Pages\EditDepartamento::route('/{record}/edit'),
        ];
    }
}
