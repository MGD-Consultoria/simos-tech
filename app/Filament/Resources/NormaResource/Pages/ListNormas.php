<?php

namespace App\Filament\Resources\NormaResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\NormaResource;
use App\Filament\Traits\HasDescendingOrder;

class ListNormas extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = NormaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
