<?php

namespace App\Enums;

enum TipoEnum : string {
    case Trancamento = 'trancamento';
    case Declaracao = 'declaracao';
    case Justificativa = 'justificativa';

    public static function active(): array
    {
        return [
            self::Trancamento->value,
            self::Declaracao->value,
            self::Justificativa->value,
        ];
    }
}