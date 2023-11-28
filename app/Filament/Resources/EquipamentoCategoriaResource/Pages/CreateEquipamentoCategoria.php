<?php

namespace App\Filament\Resources\EquipamentoCategoriaResource\Pages;

use App\Filament\Resources\EquipamentoCategoriaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEquipamentoCategoria extends CreateRecord
{
    protected static string $resource = EquipamentoCategoriaResource::class;

    protected function getRedirectUrl(): string
    {
        return EquipamentoCategoriaResource::getUrl('index');
    }
}
