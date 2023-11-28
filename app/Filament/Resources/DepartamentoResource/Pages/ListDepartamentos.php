<?php

namespace App\Filament\Resources\DepartamentoResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\DepartamentoResource;

class ListDepartamentos extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = DepartamentoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
