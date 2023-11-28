<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self AGENCIA()
 * @method static self MEI()
 * @method static self IMUNE()
 * @method static self ISENTO()
 * @method static self COLABORADOR()
 */
class GrupoFornecedor extends Enum
{
    protected static function values(): array
    {
        return [
            'AGENCIA' => 'AGÊNCIA',
            'MEI' => 'MEI',
            'IMUNE' => 'IMUNE',
            'ISENTO' => 'ISENTO',
            'COLABORADOR' => 'COLABORADOR',
        ];
    }

    public static function toArray(): array
    {
        return [
            GrupoFornecedor::AGENCIA()->value => GrupoFornecedor::AGENCIA()->value,
            GrupoFornecedor::MEI()->value => GrupoFornecedor::MEI()->value,
            GrupoFornecedor::IMUNE()->value => GrupoFornecedor::IMUNE()->value,
            GrupoFornecedor::ISENTO()->value => GrupoFornecedor::ISENTO()->value,
            GrupoFornecedor::COLABORADOR()->value => GrupoFornecedor::COLABORADOR()->value,
        ];
    }
}
