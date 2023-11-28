<?php

namespace App\Filament\Resources;

use App\Models\TipoColaborador;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use App\Filament\Resources\TipoColaboradorResource\Pages;
use Filament\Tables\Columns\TextColumn;

class TipoColaboradorResource extends Resource
{
    protected static ?string $model = TipoColaborador::class;

    //protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $label = 'tipo de colaborador';
    protected static ?string $pluralLabel = 'Tipos de colaborador';

    protected static ?string $navigationGroup = 'Configurações';



    protected static ?string $recordTitleAttribute = 'nome';

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
            ])
            ->filters([DateRangeFilter::make('created_at')])
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTipoColaboradores::route('/'),
            'create' => Pages\CreateTipoColaborador::route('/create'),
            'view' => Pages\ViewTipoColaborador::route('/{record}'),
            'edit' => Pages\EditTipoColaborador::route('/{record}/edit'),
        ];
    }
}
