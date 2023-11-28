<?php

namespace App\Filament\Resources\TipoColaboradorResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\TipoColaboradorResource;

class CreateTipoColaborador extends CreateRecord
{
    protected static string $resource = TipoColaboradorResource::class;

    protected function getRedirectUrl(): string
    {
        return TipoColaboradorResource::getUrl('index');
    }
}
