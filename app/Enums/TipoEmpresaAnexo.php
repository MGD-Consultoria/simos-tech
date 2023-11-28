<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self Arquivo()
 * @method static self Link()
 */
class TipoEmpresaAnexo extends Enum
{
    protected static function values(): array
    {
        return [
            'Arquivo' => 'Arquivo',
            'Link' => 'Link',
        ];
    }

    public static function toArray(): array
    {
        return [
            TipoEmpresaAnexo::Arquivo()->value => TipoEmpresaAnexo::Arquivo()->value,
            TipoEmpresaAnexo::Link()->value => TipoEmpresaAnexo::Link()->value,
        ];
    }
}
