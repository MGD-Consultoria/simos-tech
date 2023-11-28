<?php

namespace App\Filament\Resources\ParametroResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\ParametroResource;

class ListParametros extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = ParametroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
