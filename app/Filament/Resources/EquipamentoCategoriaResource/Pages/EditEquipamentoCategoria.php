<?php

namespace App\Filament\Resources\EquipamentoCategoriaResource\Pages;

use App\Filament\Resources\EquipamentoCategoriaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEquipamentoCategoria extends EditRecord
{
    protected static string $resource = EquipamentoCategoriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
