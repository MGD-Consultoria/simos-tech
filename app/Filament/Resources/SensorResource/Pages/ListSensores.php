<?php

namespace App\Filament\Resources\SensorResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\SensorResource;
use App\Filament\Traits\HasDescendingOrder;

class ListSensores extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = SensorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
