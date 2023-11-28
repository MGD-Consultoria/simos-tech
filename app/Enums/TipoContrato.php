<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self PERMANENTE()
 * @method static self PROVISORIO()
 */
class TipoContrato extends Enum
{
    protected static function values(): array
    {
        return [
            'PERMANENTE' => 'PERMANENTE',
            'PROVISORIO' => 'PROVISÓRIO',
        ];
    }

    public static function toArray(): array
    {
        return [
            TipoContrato::PERMANENTE()->value => TipoContrato::PERMANENTE()->value,
            TipoContrato::PROVISORIO()->value => TipoContrato::PROVISORIO()->value,
        ];
    }
}
