<?php

namespace App\Filament\Resources;

use App\Models\Sensor;
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
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\SensorResource\Pages;
use Filament\Tables\Columns\TextColumn;

class SensorResource extends Resource
{
    protected static ?string $model = Sensor::class;

    //protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $recordTitleAttribute = 'tipo';
    protected static ?string $label = 'Sensor';
    protected static ?string $pluralLabel = 'Sensores';

    protected static ?string $navigationGroup = 'Gestão Operacional';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make()->schema([
                Grid::make(['default' => 12])->schema([
                    TextInput::make('tipo')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Tipo')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('modelo')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Modelo')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    DatePicker::make('data_fabricacao')
                        ->rules(['date'])
                        ->required()
                        ->placeholder('Data Fabricacao')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('fabricante')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Fabricante')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('faixa_medicao_inicial')
                        ->rules(['numeric'])
                        ->required()
                        ->numeric()
                        ->placeholder('Faixa Medicao Inicial')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('faixa_medicao_final')
                        ->rules(['numeric'])
                        ->required()
                        ->numeric()
                        ->placeholder('Faixa Medicao Final')
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

                    TextInput::make('latitude')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Latitude')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('logintude')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Logintude')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('frequencia_leitura_dados')
                        ->rules(['numeric'])
                        ->required()
                        ->numeric()
                        ->placeholder('Frequencia Leitura Dados')
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
                TextColumn::make('tipo')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                TextColumn::make('modelo')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                TextColumn::make('data_fabricacao')
                    ->toggleable()
                    ->date(),
                TextColumn::make('fabricante')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                TextColumn::make('faixa_medicao_inicial')
                    ->toggleable()
                    ->searchable(true, null, true),
                TextColumn::make('faixa_medicao_final')
                    ->toggleable()
                    ->searchable(true, null, true),
                TextColumn::make('equipamento.numero_serie')
                    ->toggleable()
                    ->limit(50),
                TextColumn::make('latitude')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                TextColumn::make('logintude')
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                TextColumn::make('frequencia_leitura_dados')
                    ->toggleable()
                    ->searchable(true, null, true),
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
            'index' => Pages\ListSensores::route('/'),
            'create' => Pages\CreateSensor::route('/create'),
            'view' => Pages\ViewSensor::route('/{record}'),
            'edit' => Pages\EditSensor::route('/{record}/edit'),
        ];
    }
}
