<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self AVISTA()
 * @method static self UMA_PARCELA()
 * @method static self DUAS_PARCELAS()
 * @method static self TRES_PARCELAS()
 * @method static self QUATRO_PARCELAS()
 * @method static self CINCO_PARCELAS()
 * @method static self SEIS_PARCELAS()
 * @method static self SETE_PARCELAS()
 * @method static self OITO_PARCELAS()
 * @method static self NOVE_PARCELAS()
 * @method static self DEZ_PARCELAS()
 * @method static self ONZE_PARCELAS()
 * @method static self DOZE_PARCELAS()
 */
class PlanoPagamento extends Enum
{
    protected static function values(): array
    {
        return [
            'AVISTA' => 'A VISTA',
            'UMA_PARCELA' => '1X',
            'DUAS_PARCELAS' => '2X',
            'TRES_PARCELAS' => '3X',
            'QUATRO_PARCELAS' => '4X',
            'CINCO_PARCELAS' => '5X',
            'SEIS_PARCELAS' => '6X',
            'SETE_PARCELAS' => '7X',
            'OITO_PARCELAS' => '8X',
            'NOVE_PARCELAS' => '9X',
            'DEZ_PARCELAS' => '10X',
            'ONZE_PARCELAS' => '11X',
            'DOZE_PARCELAS' => '12X',
        ];
    }

    public static function toArray(): array
    {
        return [
            PlanoPagamento::AVISTA()->value => PlanoPagamento::AVISTA()->value,
            PlanoPagamento::UMA_PARCELA()->value => PlanoPagamento::UMA_PARCELA()->value,
            PlanoPagamento::DUAS_PARCELAS()->value => PlanoPagamento::DUAS_PARCELAS()->value,
            PlanoPagamento::TRES_PARCELAS()->value => PlanoPagamento::TRES_PARCELAS()->value,
            PlanoPagamento::QUATRO_PARCELAS()->value => PlanoPagamento::QUATRO_PARCELAS()->value,
            PlanoPagamento::CINCO_PARCELAS()->value => PlanoPagamento::CINCO_PARCELAS()->value,
            PlanoPagamento::SEIS_PARCELAS()->value => PlanoPagamento::SEIS_PARCELAS()->value,
            PlanoPagamento::SETE_PARCELAS()->value => PlanoPagamento::SETE_PARCELAS()->value,
            PlanoPagamento::OITO_PARCELAS()->value => PlanoPagamento::OITO_PARCELAS()->value,
            PlanoPagamento::NOVE_PARCELAS()->value => PlanoPagamento::NOVE_PARCELAS()->value,
            PlanoPagamento::DEZ_PARCELAS()->value => PlanoPagamento::DEZ_PARCELAS()->value,
            PlanoPagamento::ONZE_PARCELAS()->value => PlanoPagamento::ONZE_PARCELAS()->value,
            PlanoPagamento::DOZE_PARCELAS()->value => PlanoPagamento::DOZE_PARCELAS()->value,
        ];
    }
}
