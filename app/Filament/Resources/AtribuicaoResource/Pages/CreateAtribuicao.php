<?php

namespace App\Filament\Resources\AtribuicaoResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\AtribuicaoResource;

class CreateAtribuicao extends CreateRecord
{
    protected static string $resource = AtribuicaoResource::class;

    protected function getRedirectUrl(): string
    {
        return AtribuicaoResource::getUrl('index');
    }
}
