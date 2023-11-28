<?php

namespace App\Filament\Resources\EquipamentoCategoriaResource\Pages;

use App\Filament\Resources\EquipamentoCategoriaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEquipamentoCategorias extends ListRecords
{
    protected static string $resource = EquipamentoCategoriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
