<?php

namespace App\Filament\Resources\EmpresaResource\RelationManagers;

use App\Filament\Resources\EmpresaResource;
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
use Illuminate\Database\Eloquent\Model;

class EmpresasRelationManager extends RelationManager
{
    protected static string $relationship = 'empresas';
    protected static ?string $title = 'Filiais';

    protected static ?string $recordTitleAttribute = 'nome_fantasia';

    public function form(Form $form): Form
    {
        return EmpresaResource::form($form);

    }

    public function table(Table $table): Table
    {
        return EmpresaResource::table($table);
    }

    protected function canView(Model $record): bool
    {
        return is_null($this->empresa_id);
    }
}
