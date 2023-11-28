<?php

namespace App\Filament\Resources;

use App\Enums\EspecificacaoPagamento;
use App\Enums\MetodoPagamento;
use App\Enums\PlanoPagamento;
use App\Enums\TipoContrato;
use App\Models\Cidade;
use App\Models\Estado;
use App\Models\Funcionario;
use Filament\Forms\Components\Repeater;
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
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\FuncionarioResource\Pages;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Leandrocfe\FilamentPtbrFormFields\Document;
use Leandrocfe\FilamentPtbrFormFields\PhoneNumber;

class FuncionarioResource extends Resource
{
    protected static ?string $model = Funcionario::class;

    //protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Administração';

    protected static ?string $label = 'funcionário';
    protected static ?string $pluralLabel = 'Funcionários';

    protected static ?string $recordTitleAttribute = 'nome';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Geral')->schema([
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

                    DatePicker::make('nascimento')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Nascimento')
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

                    TextInput::make('sexo')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Sexo')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),
                    TextInput::make('alocacao')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Alocação')
                        ->label('Alocação')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    Select::make('departamento_id')
                        ->rules(['exists:departamentos,id'])
                        ->nullable()
                        ->relationship('departamento', 'nome')
                        ->searchable()
                        ->getOptionLabelFromRecordUsing(fn(Model $record) => "{$record->empresa->nome_fantasia} - {$record->nome}")
                        ->preload()
                        ->placeholder('Departamento')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    Toggle::make('pcd')
                        ->rules(['boolean'])
                        ->nullable()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),
                ]),
            ]),
            Section::make('RH')->schema([
                Grid::make(['default' => 12])->schema([
                    DatePicker::make('data_admissao')
                        ->rules(['date'])
                        ->nullable()
                        ->placeholder('Data Admissão')
                        ->label('Data Admissão')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    DatePicker::make('data_rescisao')
                        ->rules(['date'])
                        ->nullable()
                        ->placeholder('Data Rescisão')
                        ->label('Data Rescisão')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),
                    Select::make('tipo_colaborador_id')
                        ->rules(['exists:tipo_colaboradores,id'])
                        ->nullable()
                        ->relationship('tipoColaborador', 'nome')
                        ->searchable()
                        ->preload()
                        ->placeholder('Tipo Colaborador')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    Select::make('atribuicao_id')
                        ->rules(['exists:atribuicoes,id'])
                        ->nullable()
                        ->relationship('atribuicao', 'nome')
                        ->searchable()
                        ->preload()
                        ->label('Atribuição')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    DatePicker::make('inicio_atribuicao')
                        ->rules(['date'])
                        ->nullable()
                        ->placeholder('Início Atribuição')
                        ->label('Início Atribuição')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    DatePicker::make('fim_atribuicao')
                        ->rules(['date'])
                        ->nullable()
                        ->placeholder('Fim Atribuição')
                        ->label('Fim Atribuição')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    DatePicker::make('data_expiracao')
                        ->rules(['date'])
                        ->nullable()
                        ->placeholder('Data Expiração')
                        ->label('Data Expiração')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    Select::make('tipo_contrato')
                        ->options(TipoContrato::toArray())
                        ->nullable()
                        ->placeholder('Tipo Contrato')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('tempo_servico')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Tempo Servico')
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
            Section::make('Documentos')->schema([
                Grid::make(['default' => 12])->schema([
                    Document::make('cpf')
                        ->cpf()
                        ->nullable()
                        ->dehydrateStateUsing(fn(?string $state): ?string => removeMascaraCnpjCpf($state))
                        ->placeholder('CPF')
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
                        ->placeholder('Titulo Eleitor')
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
                        ->placeholder('Carteira Trabalho')
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

            Section::make('Contato')->schema([
                Grid::make(['default' => 12])->schema([
                    PhoneNumber::make('telefone')
                        ->nullable()
                        ->placeholder('Telefone')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('email')
                        ->rules(['email'])
                        ->nullable()
                        ->email()
                        ->placeholder('Email')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),
                ]),
            ]),

            Section::make('Pessoais')->schema([
                Grid::make(['default' => 12])->schema([
                    TextInput::make('estado_civil')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Estado Civil')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('conjuge_nome')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Conjuge Nome')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),

                    TextInput::make('conjuge_nascimento')
                        ->rules(['max:255', 'string'])
                        ->nullable()
                        ->placeholder('Conjuge Nascimento')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 4,
                        ]),
                    Repeater::make('filhos')
                        ->relationship('filhos')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('nome')
                                    ->rules(['max:255', 'string'])
                                    ->nullable()
                                    ->placeholder('Nome')
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 6,
                                        'lg' => 6,
                                    ]),
                                DatePicker::make('data_nascimento')
                                    ->label('Data de Nascimento')
                                    ->columnSpan([
                                        'default' => 12,
                                        'md' => 6,
                                        'lg' => 6,
                                    ]),
                            ]),
                        ])->columnSpan([
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
                        ->options(PlanoPagamento::toArray())
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
                TextColumn::make('nome')
                    ->toggleable()
                    ->searchable(true, null, false)
                    ->limit(50),
                TextColumn::make('nome_social')
                    ->toggleable(true, true)
                    ->searchable(true, null, false)
                    ->limit(50),
                TextColumn::make('tipoColaborador.nome')
                    ->label('Tipo')
                    ->toggleable()
                    ->limit(50),
                IconColumn::make('pcd')
                    ->label('PCD')
                    ->toggleable(true, true)
                    ->boolean(),
                TextColumn::make('data_admissao')
                    ->toggleable(true, true)
                    ->date('d/m/Y'),
                TextColumn::make('data_rescisao')
                    ->toggleable(true, true)
                    ->date('d/m/Y'),
                TextColumn::make('atribuicao.nome')
                    ->label('Atribuição')
                    ->toggleable(true, true)
                    ->limit(50),
                TextColumn::make('tipo_contrato')
                    ->label('Tipo de Contrato')
                    ->toggleable(true, true)
                    ->searchable(true, null, false)
                    ->limit(50),
                TextColumn::make('cpf')
                    ->toggleable(true, true)
                    ->formatStateUsing(fn($state) => cpf_format($state))
                    ->searchable(true, null, false)
                    ->limit(50),
                TextColumn::make('telefone')
                    ->toggleable()
                    ->searchable(true, null, false)
                    ->limit(50),
                TextColumn::make('email')
                    ->toggleable()
                    ->searchable(true, null, false)
                    ->limit(50),
                TextColumn::make('departamento.nome')
                    ->toggleable()
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
//            FuncionarioResource\RelationManagers\DepartamentosRelationManager::class,
            FuncionarioResource\RelationManagers\FuncionarioAnexosRelationManager::class,
            //FuncionarioResource\RelationManagers\FilhosRelationManager::class,
//            FuncionarioResource\RelationManagers\EquipamentosRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFuncionarios::route('/'),
            'create' => Pages\CreateFuncionario::route('/create'),
            'edit' => Pages\EditFuncionario::route('/{record}/edit'),
        ];
    }
}
