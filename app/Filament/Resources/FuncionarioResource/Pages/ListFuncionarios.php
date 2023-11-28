<?php

namespace App\Filament\Resources\FuncionarioResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasDescendingOrder;
use App\Filament\Resources\FuncionarioResource;

class ListFuncionarios extends ListRecords
{
    use HasDescendingOrder;

    protected static string $resource = FuncionarioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
