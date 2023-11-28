<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self PJ()
 * @method static self PF()
 */
class TipoFornecedor extends Enum
{
    protected static function values(): array
    {
        return [
            'PJ' => 'PJ',
            'PF' => 'PF',
        ];
    }

    public static function toArray(): array
    {
        return [
            TipoFornecedor::PJ()->value => TipoFornecedor::PJ()->value,
            TipoFornecedor::PF()->value => TipoFornecedor::PF()->value,
        ];
    }
}
