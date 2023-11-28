<?php

namespace App\Filament\Resources\CentroCustoResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\CentroCustoResource;

class ListCentroCustos extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = CentroCustoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
