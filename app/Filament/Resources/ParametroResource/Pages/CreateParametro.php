<?php

namespace App\Filament\Resources\ParametroResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ParametroResource;

class CreateParametro extends CreateRecord
{
    protected static string $resource = ParametroResource::class;

    protected function getRedirectUrl(): string
    {
        return ParametroResource::getUrl('index');
    }
}
