<?php

namespace App\Filament\Resources\TipoColaboradorResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\TipoColaboradorResource;

class ListTipoColaboradores extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = TipoColaboradorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
