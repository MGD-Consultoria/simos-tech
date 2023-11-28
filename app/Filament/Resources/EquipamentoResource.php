<?php

namespace App\Filament\Resources;

use App\Enums\CondicaoEquipamento;
use App\Enums\TipoFornecedor;
use App\Models\Equipamento;
use App\Models\Fornecedor;
use Filament\Forms\Components\Textarea;
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
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\EquipamentoResource\Pages;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;

class EquipamentoResource extends Resource
{
    protected static ?string $model = Equipamento::class;

    //protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Operação';

    protected static ?string $recordTitleAttribute = 'numero_serie';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Identificação')->schema([
                Grid::make(['default' => 12])->schema([
                    TextInput::make('numero_serie')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Número de série')
                        ->label('Número de série')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('nome')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Nome')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    Select::make('categoria_id')
                        ->rules(['exists:equipamento_categoria,id'])
                        ->nullable()
                        ->relationship('categoria', 'nome')
                        ->searchable()
                        ->preload()
                        ->label('Categoria')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),
                ]),
            ]),
            Section::make('Informações Técnicas')->schema([
                Grid::make(['default' => 12])->schema([
                    TextInput::make('fabricante')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Fabricante')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('ano_fabricacao')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Ano Fabricação')
                        ->label('Ano Fabricação')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('capacidade_desempenho')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Capacidade Desempenho')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),
                    Textarea::make('especificacoes_tecnicas')
                        ->label('Especificações Técnicas')
                        ->placeholder('Especificações Técnicas')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),
                ]),
            ]),
            Section::make('Manutenção')->schema([
                Grid::make(['default' => 12])->schema([
                    Select::make('condicao_atual')
                        ->options(CondicaoEquipamento::toArray())
                        ->nullable()
                        ->placeholder('Condição Atual')
                        ->label('Condição Atual')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),
                    DatePicker::make('data_compra')
                        ->rules(['date'])
                        ->nullable()
                        ->label('Data da Compra')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    DatePicker::make('data_instalacao')
                        ->rules(['date'])
                        ->nullable()
                        ->label('Data da Instalação')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    DatePicker::make('ultima_manutencao')
                        ->rules(['date'])
                        ->nullable()
                        ->label('Última Manutenção')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('periodicidade_manutencao')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Periodicidade Manutenção')
                        ->label('Periodicidade Manutenção (dias)')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('garantia')
                        ->rules(['numeric'])
                        ->nullable()
                        ->numeric()
                        ->placeholder('Garantia')
                        ->label('Garantia (dias)')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    Textarea::make('observacao')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Observação')
                        ->label('Observação')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),
                ]),
            ]),
            Section::make('Localização')->schema([
                Grid::make(['default' => 12])->schema([
                    TextInput::make('localizacao_setor')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Setor')
                        ->label('Setor')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('latitude')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Latitude')
                        ->label('Latitude')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),
                    TextInput::make('longitude')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Longitude')
                        ->label('Longitude')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),
                ]),
            ]),
            Section::make('Contato')->schema([
                Grid::make(['default' => 12])->schema([
                    Select::make('responsavel_id')
                        ->rules(['exists:funcionarios,id'])
                        ->preload()
                        ->relationship('responsavel', 'nome')
                        ->searchable()
                        ->label('Responsável')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    Select::make('fornecedor_id')
                        ->rules(['exists:fornecedores,id'])
                        ->relationship('fornecedor','nome')
                        ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->nome_fantasia} {$record->nome}")
                        ->searchable()
                        ->preload()
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
                TextColumn::make('numero_serie')
                    ->label('Número de série')
                    ->toggleable()
                    ->searchable(true, null, false)
                    ->limit(50),
                TextColumn::make('nome')
                    ->toggleable()
                    ->searchable(true, null, false)
                    ->limit(50),
                TextColumn::make('categoria.nome')
                    ->label('Categoria')
                    ->toggleable()
                    ->searchable(true, null, false)
                    ->limit(50),
                TextColumn::make('fabricante')
                    ->toggleable()
                    ->searchable(true, null, false)
                    ->limit(50),
            ])
            ->filters([
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
        return [
            EquipamentoResource\RelationManagers\ManutencoesRelationManager::class,
            EquipamentoResource\RelationManagers\SensoresRelationManager::class,
//            EquipamentoResource\RelationManagers\NormasRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEquipamentos::route('/'),
            'create' => Pages\CreateEquipamento::route('/create'),
            'edit' => Pages\EditEquipamento::route('/{record}/edit'),
        ];
    }
}
