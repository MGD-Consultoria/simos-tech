<?php

namespace App\Filament\Resources;

use App\Models\Manutencao;
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
use App\Filament\Resources\ManutencaoResource\Pages;
use Filament\Tables\Columns\TextColumn;

class ManutencaoResource extends Resource
{
    protected static ?string $model = Manutencao::class;

    //protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $recordTitleAttribute = 'descricao';
    protected static ?string $label = 'manutenção';
    protected static ?string $pluralLabel = 'Manutenções';

    protected static ?string $navigationGroup = 'Gestão Operacional';
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make()->schema([
                Grid::make(['default' => 12])->schema([
                    TextInput::make('tipo_manutencao')
                        ->rules(['numeric'])
                        ->nullable()
                        ->placeholder('Tipo Manutenção')
                        ->label('Tipo Manutenção')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('descricao')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Descricao')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('responsavel')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Responsavel')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('tecnico')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Tecnico')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('contato_tecnico')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Contato Tecnico')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    Select::make('equipamento_id')
                        ->rules(['exists:equipamentos,id'])
                        ->required()
                        ->relationship('equipamento', 'numero_serie')
                        ->searchable()
                        ->placeholder('Equipamento')
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
                TextColumn::make('tipo_manutencao')
                    ->toggleable()
                    ->searchable(true, null, true),
                TextColumn::make('descricao')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                TextColumn::make('responsavel')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                TextColumn::make('tecnico')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                TextColumn::make('contato_tecnico')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                TextColumn::make('equipamento.numero_serie')
                    ->toggleable()
                    ->limit(50),
            ])
            ->filters([
                DateRangeFilter::make('created_at'),

                SelectFilter::make('equipamento_id')
                    ->relationship('equipamento', 'numero_serie')
                    ->indicator('Equipamento')
                    ->multiple()
                    ->label('Equipamento'),
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
            'index' => Pages\ListManutencoes::route('/'),
            'create' => Pages\CreateManutencao::route('/create'),
            'view' => Pages\ViewManutencao::route('/{record}'),
            'edit' => Pages\EditManutencao::route('/{record}/edit'),
        ];
    }
}
