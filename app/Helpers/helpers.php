<?php

if (!function_exists('removeMascaraCnpjCpf')) {
    function removeMascaraCnpjCpf($cnpjCpf)
    {
        if(strlen($cnpjCpf) == 0){
            return null;
        }
        $cnpjCpf = preg_replace("/[^0-9]/", "", $cnpjCpf);

        if (strlen($cnpjCpf) == 11 || strlen($cnpjCpf) == 14) {
            return $cnpjCpf;
        } else {
            return false;
        }
    }
}

if (!function_exists('removeMascaraCep')) {
    function removeMascaraCep($cep)
    {
        return preg_replace('/\D/', '', $cep);
    }
}

if (!function_exists('cep_format')) {
    function cep_format($cep): string
    {
        $cep = preg_replace("/[^0-9]/", "", $cep);

        if (strlen($cep) == 8) {
            return substr($cep, 0, 5) . '-' . substr($cep, 5, 3);
        }

        return $cep;
    }
}

if (!function_exists('cpf_format')) {
    function cpf_format($cpf)
    {
        // Remove todos os caracteres não numéricos do CPF
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        // Verifica se o CPF possui 11 dígitos
        if (strlen($cpf) !== 11) {
            return "CPF inválido";
        }

        // Aplica a formatação XXX.XXX.XXX-XX
        $cpf_formatado = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);

        return $cpf_formatado;
    }
}

if (!function_exists('cnpj_format')) {
    function cnpj_format($cnpj)
    {
        // Remove qualquer formatação que já exista
        $cnpjLimpo = preg_replace("/[^0-9]/", "", $cnpj);

        // Verifica se depois da limpeza ficou com 14 caracteres, que é o tamanho de um CNPJ
        if (strlen($cnpjLimpo) != 14) {
            return false;
        }

        // Adiciona os pontos, a barra e o hífen
        $cnpjFormatado = preg_replace(
            "/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/",
            "$1.$2.$3/$4-$5",
            $cnpjLimpo
        );

        return $cnpjFormatado;
    }
}
