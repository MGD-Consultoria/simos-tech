<?php

namespace App\Livewire;

use Filament\Widgets\ChartWidget;

class RandomChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected int|string|array $columnSpan = 'full';

    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'SHSG27',
                    'data' => [69, 70, 31, 97, 44, 42, 73, 11, 6, 62, 58, 9],
                    'backgroundColor' => '#FF5733',
                ],
                [
                    'label' => 'JKH29S',
                    'data' => [58, 34, 93, 67, 74, 89, 16, 29, 51, 42, 66, 64],
                    'backgroundColor' => '#42A5F5',
                ],
                [
                    'label' => 'U1SDJ3',
                    'data' => [16, 52, 75, 82, 38, 88, 23, 94, 37, 80, 18, 31],
                    'backgroundColor' => '#99CC99',
                ],
            ],
            'labels' => ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
