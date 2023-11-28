<?php

namespace App\Filament\Resources\EmpresaResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\EmpresaResource;

class ListEmpresas extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = EmpresaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
