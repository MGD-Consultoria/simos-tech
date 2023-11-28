<?php

namespace App\Filament\Resources\ManutencaoResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\ManutencaoResource;

class ListManutencoes extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = ManutencaoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
