<?php

namespace App\Livewire;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Operadores', '1.432'),
            Stat::make('Sensores', '67'),
            Stat::make('Risco', 'Sem riscos'),
        ];
    }
}
