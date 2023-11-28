<?php

namespace App\Filament\Resources;

use App\Enums\EspecificacaoPagamento;
use App\Enums\GrupoFornecedor;
use App\Enums\MetodoPagamento;
use App\Enums\TipoFornecedor;
use App\Models\Cidade;
use App\Models\Estado;
use App\Models\Fornecedor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\FornecedorResource\Pages;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Leandrocfe\FilamentPtbrFormFields\Document;
use Leandrocfe\FilamentPtbrFormFields\PhoneNumber;

class FornecedorResource extends Resource
{
    protected static ?string $model = Fornecedor::class;

    //protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $navigationGroup = 'Cadastros';
    protected static ?string $label = 'fornecedor';
    protected static ?string $pluralLabel = 'Fornecedores';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Tipo')->schema([
                Grid::make(['default' => 12])->schema([
                    Select::make('tipo')
                        ->options(TipoFornecedor::toArray())
                        ->nullable()
                        ->live()
                        ->placeholder('Tipo')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),
                ]),

            ]),

            Section::make('Geral')
                ->visible(fn(Get $get): bool => $get('tipo') == TipoFornecedor::PF())
                ->schema([
                    Grid::make(['default' => 12])->schema([
                        TextInput::make('nome')
                            ->rules(['max:255', 'string'])
                            ->nullable()
                            ->placeholder('Nome')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 6,
                                'lg' => 4,
                            ]),
                        Select::make('grupo')
                            ->nullable()
                            ->options(GrupoFornecedor::toArray())
                            ->columnSpan([
                                'default' => 12,
                                'md' => 6,
                                'lg' => 4,
                            ]),
                        DatePicker::make('data_nascimento')
                            ->rules(['date'])
                            ->nullable()
                            ->placeholder('Data Nascimento')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 6,
                                'lg' => 4,
                            ]),

                        TextInput::make('nome_social')
                            ->rules(['max:255', 'string'])
                            ->nullable()
                            ->placeholder('Nome Social')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 6,
                                'lg' => 4,
                            ]),

                        TextInput::make('sexo')
                            ->rules(['max:255', 'string'])
                            ->nullable()
                            ->placeholder('Sexo')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 6,
                                'lg' => 4,
                            ]),
                        TextInput::make('genero')
                            ->rules(['max:255', 'string'])
                            ->nullable()
                            ->placeholder('Gênero')
                            ->label('Gênero')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 6,
                                'lg' => 4,
                            ]),
                        TextInput::make('moeda')
                            ->label('Moeda')
                            ->rules(['max:255', 'string'])
                            ->nullable()
                            ->placeholder('Moeda')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 6,
                                'lg' => 4,
                            ]),

                        Toggle::make('ativo')
                            ->label('Ativo')
                            ->nullable()
                            ->columnSpan([
                                'default' => 12,
                                'md' => 12,
                                'lg' => 12,
                            ]),
                        Toggle::make('estrangeiro')
                            ->label('Estrangeiro')
                            ->nullable()
                            ->columnSpan([
                                'default' => 12,
                                'md' => 12,
                                'lg' => 12,
                            ]),
                    ]),
                ]),
            Section::make('Geral')
                ->visible(fn(Get $get): bool => $get('tipo') == TipoFornecedor::PJ())
                ->schema([
                    Grid::make(['default' => 12])->schema([
                        TextInput::make('nome_fantasia')
                            ->rules(['max:255', 'string'])
                            ->nullable()
                            ->placeholder('Nome Fantasia')
                            ->label('Nome Fantasia')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 6,
                                'lg' => 4,
                            ]),

                        TextInput::make('razao_social')
                            ->rules(['max:255', 'string'])
                            ->nullable()
                            ->placeholder('Razão Social')
                            ->label('Razão Social')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 6,
                                'lg' => 4,
                            ]),

                        Select::make('grupo')
                            ->nullable()
                            ->options(GrupoFornecedor::toArray())
                            ->columnSpan([
                                'default' => 12,
                                'md' => 6,
                                'lg' => 4,
                            ]),

                        TextInput::make('cod_internacional')
                            ->label('Códigos Internacionais')
                            ->rules(['max:255', 'string'])
                            ->nullable()
                            ->placeholder('Códigos Internacionais')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 6,
                                'lg' => 4,
                            ]),
                        TextInput::make('moeda')
                            ->label('Moeda')
                            ->rules(['max:255', 'string'])
                            ->nullable()
                            ->placeholder('Moeda')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 6,
                                'lg' => 4,
                            ]),

                        Toggle::make('ativo')
                            ->label('Ativo')
                            ->nullable()
                            ->columnSpan([
                                'default' => 12,
                                'md' => 12,
                                'lg' => 12,
                            ]),
                        Toggle::make('estrangeiro')
                            ->label('Estrangeiro')
                            ->nullable()
                            ->columnSpan([
                                'default' => 12,
                                'md' => 12,
                                'lg' => 12,
                            ]),

                    ]),
                ]),
            Section::make('Fiscal')
                ->visible(fn(Get $get): bool => $get('tipo') == TipoFornecedor::PF())
                ->schema([
                    Grid::make(['default' => 12])->schema([
                        Document::make('cpf')
                            ->cpf()
                            ->nullable()
                            ->placeholder('CPF')
                            ->dehydrateStateUsing(fn(?string $state): ?string => removeMascaraCnpjCpf($state))
                            ->label('CPF')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 6,
                                'lg' => 4,
                            ]),

                        TextInput::make('rg')
                            ->rules(['max:255', 'string'])
                            ->nullable()
                            ->placeholder('RG')
                            ->label('RG')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 6,
                                'lg' => 4,
                            ]),

                        TextInput::make('titulo_eleitor')
                            ->rules(['max:255', 'string'])
                            ->nullable()
                            ->placeholder('Titulo de Eleitor')
                            ->label('Titulo de Eleitor')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 6,
                                'lg' => 4,
                            ]),

                        TextInput::make('cartao_sus')
                            ->rules(['max:255', 'string'])
                            ->nullable()
                            ->placeholder('Cartão SUS')
                            ->label('Cartão SUS')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 6,
                                'lg' => 4,
                            ]),

                        TextInput::make('carteira_trabalho')
                            ->rules(['max:255', 'string'])
                            ->nullable()
                            ->placeholder('Carteira de Trabalho')
                            ->label('Carteira de Trabalho')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 6,
                                'lg' => 4,
                            ]),

                        TextInput::make('cnh')
                            ->rules(['max:255', 'string'])
                            ->nullable()
                            ->placeholder('CNH')
                            ->label('CNH')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 6,
                                'lg' => 4,
                            ]),
                    ]),
                ]),
            Section::make('Fiscal')
                ->visible(fn(Get $get): bool => $get('tipo') == TipoFornecedor::PJ())->schema([
                    Grid::make(['default' => 12])->schema([

                        Document::make('cnpj')
                            ->cnpj()
                            ->nullable()
                            ->dehydrateStateUsing(fn(?string $state): ?string => removeMascaraCnpjCpf($state))
                            ->placeholder('CNPJ')
                            ->label('CNPJ')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 6,
                                'lg' => 4,
                            ]),

                        TextInput::make('inscricao_municipal')
                            ->rules(['max:255', 'string'])
                            ->nullable()
                            ->placeholder('Inscrição Municipal')
                            ->label('Inscrição Municipal')
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

                        TextInput::make('ccm')
                            ->rules(['max:255', 'string'])
                            ->nullable()
                            ->placeholder('CCM')
                            ->label('CCM')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 6,
                                'lg' => 4,
                            ]),

                        TextInput::make('cnae')
                            ->rules(['max:255', 'string'])
                            ->nullable()
                            ->placeholder('CNAE')
                            ->label('CNAE')
                            ->columnSpan([
                                'default' => 12,
                                'md' => 6,
                                'lg' => 4,
                            ]),

                        TextInput::make('naics')
                            ->rules(['max:255', 'string'])
                            ->nullable()
                            ->placeholder('NAICS')
                            ->label('NAICS')
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

            Section::make('Endereço')->schema([
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
            Section::make('Contato')->schema([
                Grid::make(['default' => 12])->schema([
                    PhoneNumber::make('telefone_principal')
                        ->label('Telefone Principal')
                        ->nullable()
                        ->placeholder('Telefone Principal')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),
                    TextInput::make('email_principal')
                        ->rules(['max:255', 'string'])
                        ->label('Email Principal')
                        ->nullable()
                        ->placeholder('Email Principal')
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
            Section::make('Pagamento')->schema([
                Grid::make(['default' => 12])->schema([

                    TextInput::make('conta_bancaria')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Conta Bancária')
                        ->label('Conta Bancária')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    Select::make('metodo_pagamento')
                        ->nullable()
                        ->options(MetodoPagamento::toArray())
                        ->label('Método de Pagamento')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    Select::make('especificacao_pagamento')
                        ->options(EspecificacaoPagamento::toArray())
                        ->nullable()
                        ->label('Especificação Pagamento')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    Select::make('plano_pagamento')
                        ->options(EspecificacaoPagamento::toArray())
                        ->nullable()
                        ->label('Plano de Pagamento')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('desconto')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Desconto')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('dia_pagamento')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Dia Pagamento')
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
                    ->searchable(true, null, false)
                    ->limit(50),
                TextColumn::make('fornecedor_nome')
                    ->label('Nome')
                    ->toggleable(true, false)
                    ->searchable(true, null, false)
                    ->limit(50),
                TextColumn::make('fornecedor_documento')
                    ->label('CPF/CNPJ')
                    ->toggleable(true,false)
                    ->searchable(true, null, false)
                    ->limit(50),
                IconColumn::make('ativo')
                ->boolean(),
                IconColumn::make('estrangeiro')
                ->boolean(),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFornecedores::route('/'),
            'create' => Pages\CreateFornecedor::route('/create'),
            'edit' => Pages\EditFornecedor::route('/{record}/edit'),
        ];
    }
}
