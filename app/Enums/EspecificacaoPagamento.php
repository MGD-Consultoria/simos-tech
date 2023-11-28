<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self BOLETO()
 * @method static self TED()
 * @method static self DOC()
 * @method static self CREDITO_EM_CONTA()
 */
class EspecificacaoPagamento extends Enum
{
    protected static function values(): array
    {
        return [
            'BOLETO' => 'BOLETO',
            'TED' => 'TED',
            'DOC' => 'DOC',
            'CREDITO_EM_CONTA' => 'CRÉDITO EM CONTA',
        ];
    }

    public static function toArray(): array
    {
        return [
            EspecificacaoPagamento::BOLETO()->value => EspecificacaoPagamento::BOLETO()->value,
            EspecificacaoPagamento::TED()->value => EspecificacaoPagamento::TED()->value,
            EspecificacaoPagamento::DOC()->value => EspecificacaoPagamento::DOC()->value,
            EspecificacaoPagamento::CREDITO_EM_CONTA()->value => EspecificacaoPagamento::CREDITO_EM_CONTA()->value,
        ];
    }
}
