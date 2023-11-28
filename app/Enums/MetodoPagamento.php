<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self CHEQUE()
 * @method static self DEBITO_AUTOMATICO()
 * @method static self PAGAMENTO_ELETRONICO()
 * @method static self ADIANTAMENTO()
 */
class MetodoPagamento extends Enum
{
    protected static function values(): array
    {
        return [
            'CHEQUE' => 'CHEQUE',
            'DEBITO_AUTOMATICO' => 'DÉBITO AUTOMÁTICO',
            'PAGAMENTO_ELETRONICO' => 'PAGAMENTO ELETRÔNICO',
            'ADIANTAMENTO' => 'ADIANTAMENTO',
        ];
    }

    public static function toArray(): array
    {
        return [
            MetodoPagamento::CHEQUE()->value => MetodoPagamento::CHEQUE()->value,
            MetodoPagamento::DEBITO_AUTOMATICO()->value => MetodoPagamento::DEBITO_AUTOMATICO()->value,
            MetodoPagamento::PAGAMENTO_ELETRONICO()->value => MetodoPagamento::PAGAMENTO_ELETRONICO()->value,
            MetodoPagamento::ADIANTAMENTO()->value => MetodoPagamento::ADIANTAMENTO()->value,
        ];
    }
}
