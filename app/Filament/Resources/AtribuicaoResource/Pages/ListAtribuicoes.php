<?php

namespace App\Filament\Resources\AtribuicaoResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\AtribuicaoResource;

class ListAtribuicoes extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = AtribuicaoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
