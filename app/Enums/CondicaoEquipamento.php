<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self NOVO()
 * @method static self USADO()
 */
class CondicaoEquipamento extends Enum
{
    protected static function values(): array
    {
        return [
            'NOVO' => 'NOVO',
            'USADO' => 'USADO',
        ];
    }

    public static function toArray(): array
    {
        return [
            CondicaoEquipamento::NOVO()->value => CondicaoEquipamento::NOVO()->value,
            CondicaoEquipamento::USADO()->value => CondicaoEquipamento::USADO()->value,
        ];
    }
}
