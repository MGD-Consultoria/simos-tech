<?php

namespace App\Filament\Resources;

use App\Models\Cidade;
use App\Models\Empresa;
use App\Models\Estado;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
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
use App\Filament\Resources\EmpresaResource\Pages;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Leandrocfe\FilamentPtbrFormFields\Cep;
use Leandrocfe\FilamentPtbrFormFields\Document;
use Leandrocfe\FilamentPtbrFormFields\PhoneNumber;

class EmpresaResource extends Resource
{
    protected static ?string $model = Empresa::class;

    //protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Administração';
    protected static ?string $recordTitleAttribute = 'nome_fantasia';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Geral')->schema([
                Grid::make(['default' => 12])->schema([
                    TextInput::make('nome_fantasia')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Nome Fantasia')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('razao_social')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Razao Social')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    Document::make('cnpj')
                        ->cnpj()
                        ->nullable()
                        ->dehydrateStateUsing(fn(?string $state): string => removeMascaraCnpjCpf($state))
                        ->placeholder('CNPJ')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                ]),
            ]),
            Section::make('Localização')->schema([
                Grid::make(['default' => 12])->schema([
                    TextInput::make('cep')
                        ->mask('99999-999')
                        ->placeholder('Cep')
                        ->live()
                        ->afterStateUpdated(function (?string $state, Set $set) {
                            if (!empty($state) && strlen($state) == 9) {
                                $cep = removeMascaraCep($state);
                                $request = Http::get("viacep.com.br/ws/$cep/json/")->json();
                                $set('rua', $request['logradouro']);
                                $set('bairro', $request['bairro']);
                                $estado = Estado::query()->where('uf', $request['uf'])->first();
                                if (!empty($estado->id)) {
                                    $set('estado_id', $estado->id);
                                    $cidade = Cidade::query()->where('estado_id', $estado->id)->where('nome', 'like', $request['localidade'])->first();
                                    if (!empty($cidade->id)) {
                                        $set('cidade_id', $cidade->id);
                                    }
                                }
                            }
                        })
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('rua')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Rua')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('numero')
                        ->rules(['max:255', 'string'])
                        ->label('Número')
                        ->nullable()
                        ->placeholder('Número')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('complemento')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Complemento')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('bairro')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Bairro')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    Select::make('estado_id')
                        ->label('Estado')
                        ->options(Estado::all()->pluck('uf', 'id')->toArray())
                        ->live()
                        ->placeholder('Selecione o Estado')
                        ->afterStateUpdated(fn(Set $set) => $set('cidade_id', null))
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),
                    Select::make('cidade_id')
                        ->label('Cidade')
                        ->searchable()
//                        ->default(function (Get $get): array {
//                            return $get('cidade_id');
//                        })
                        ->placeholder('Selecione a cidade')
                        ->options(function (Get $get): array {
                            $estadoId = $get('estado_id');
                            if (!empty($estadoId)) {
                                return Cidade::where('estado_id', $estadoId)->pluck('nome', 'id')->toArray();
                            } else {
                                return [];
                            }
                        })
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),
                ]),
            ]),
            Section::make('Fiscal')->schema([
                Grid::make(['default' => 12])->schema([
                    TextInput::make('inscricao_municipal')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->label('Inscrição Municipal')
                        ->placeholder('Inscrição Municipal')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('inscricao_estadual')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Inscrição Estadual')
                        ->label('Inscrição Estadual')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('cnae')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->label('CNAE')
                        ->placeholder('CNAE')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('ccm')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->label('CCM')
                        ->placeholder('CCM')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('naics')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('NAICS')
                        ->placeholder('NAICS')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('duns')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('DUNS')
                        ->label('DUNS')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                ]),
            ]),
            Section::make('Contato')->schema([
                Grid::make(['default' => 12])->schema([
                    PhoneNumber::make('telefone_principal_empresa')
                        ->label('Telefone Principal')
                        ->nullable()
                        ->placeholder('Telefone Principal Empresa')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),
                    TextInput::make('email_principal_empresa')
                        ->rules(['max:255', 'string'])
                        ->label('Email Principal')
                        ->nullable()
                        ->placeholder('Email Principal Empresa')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),
                    Repeater::make('representante')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('representante')
                                    ->rules(['max:255', 'string'])
                                    ->nullable()
                                    ->placeholder('Representante')
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 6,
                                        'lg' => 4,
                                    ]),

                                TextInput::make('representante_telefone')
                                    ->rules(['max:255', 'string'])
                                    ->nullable()
                                    ->placeholder('Representante Telefone')
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 6,
                                        'lg' => 4,
                                    ]),

                                TextInput::make('representante_email')
                                    ->rules(['max:255', 'string'])
                                    ->nullable()
                                    ->placeholder('Representante Email')
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 6,
                                        'lg' => 4,
                                    ]),
                            ]),
                        ])
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                ]),
            ]),
            Section::make('Visual')->schema([
                Grid::make(['default' => 12])->schema([
                    FileUpload::make('logo')
                        ->nullable()
                        ->openable()
                        ->downloadable()
                        ->placeholder('Logo')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    FileUpload::make('logo_relatorio')
                        ->nullable()
                        ->openable()
                        ->downloadable()
                        ->placeholder('Logo Relatorio')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('cod_internacional')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Cod Internacional')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),
//                    Select::make('empresa_id')
//                        ->rules(['exists:empresas,id'])
//                        ->nullable()
//                        ->relationship('filial', 'nome_fantasia')
//                        ->searchable()
//                        ->placeholder('Filial')
//                        ->columnSpan([
//                            'default' => 12,
//                            'md' => 6,
//                            'lg' => 4,
//                        ]),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('60s')
            ->columns([
                TextColumn::make('nome_fantasia')
                    ->toggleable()
                    ->label('Nome Fantasia')
                    ->searchable(true, null, false)
                    ->limit(50),
                TextColumn::make('razao_social')
                    ->toggleable()
                    ->label('Razão Social')
                    ->searchable(true, null, false)
                    ->limit(50),
                TextColumn::make('cnpj')
                    ->toggleable()
                    ->formatStateUsing(fn($state) => cnpj_format($state))
                    ->searchable(true, null, false)
                    ->limit(50),
                TextColumn::make('inscricao_municipal')
                    ->label('Inscrição Municipal')
                    ->toggleable(true, true)
                    ->searchable(true, null, false)
                    ->limit(50),
                TextColumn::make('inscricao_estadual')
                    ->toggleable(true, true)
                    ->label('Inscrição Estadual')
                    ->searchable(true, null, false)
                    ->limit(50),
                TextColumn::make('cnae')
                    ->label('CNAE')
                    ->toggleable(true, true)
                    ->searchable(true, null, false)
                    ->limit(50),
                TextColumn::make('ccm')
                    ->label('CCM')
                    ->toggleable(true, true)
                    ->searchable(true, null, false)
                    ->limit(50),
                TextColumn::make('naics')
                    ->label('NAICS')
                    ->toggleable(true, true)
                    ->searchable(true, null, false)
                    ->limit(50),
                TextColumn::make('duns')
                    ->label('DUNS')
                    ->toggleable(true, true)
                    ->searchable(true, null, false)
                    ->limit(50),
                TextColumn::make('telefone_principal_empresa')
                    ->label('Telefone')
                    ->toggleable(true, true)
                    ->searchable(true, null, false)
                    ->limit(50),
                TextColumn::make('email_principal_empresa')
                    ->label('Email')
                    ->toggleable(true, true)
                    ->searchable(true, null, false)
                    ->limit(50),
                TextColumn::make('estado.nome')
                    ->label('Estado')
                    ->toggleable(true, true)
                    ->limit(50),
                TextColumn::make('cidade.nome')
                    ->label('Cidade')
                    ->toggleable(true, true)
                    ->limit(50),
            ])
            ->filters([
                SelectFilter::make('estado_id')
                    ->relationship('estado', 'nome')
                    ->indicator('Estado')
                    ->multiple()
                    ->label('Estado'),

                SelectFilter::make('cidade_id')
                    ->relationship('cidade', 'nome')
                    ->indicator('Cidade')
                    ->multiple()
                    ->label('Cidade'),

                SelectFilter::make('empresa_id')
                    ->label('Matriz')
                    ->relationship('filial', 'nome_fantasia')
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
        return [
            EmpresaResource\RelationManagers\EmpresasRelationManager::class,
            EmpresaResource\RelationManagers\EmpresaAnexosRelationManager::class,
            EmpresaResource\RelationManagers\DepartamentosRelationManager::class,
            EmpresaResource\RelationManagers\CentroCustoEmpresasRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmpresas::route('/'),
            'create' => Pages\CreateEmpresa::route('/create'),
//            'view' => Pages\ViewEmpresa::route('/{record}'),
            'edit' => Pages\EditEmpresa::route('/{record}/edit'),
        ];
    }
}
