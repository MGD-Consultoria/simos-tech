<?php

namespace App\Filament\Resources\EquipamentoResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\EquipamentoResource;

class ListEquipamentos extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = EquipamentoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
