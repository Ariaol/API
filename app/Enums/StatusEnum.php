<?php

namespace App\Enums;

enum StatusEnum : string {
    case Analise = 'analise';
    case Aprovado = 'aprovado';
    case Negado = 'negado';
    case Concluido = 'concluido';

    public static function active(): array
    {
        return [
            self::Analise->value,
            self::Aprovado->value,
            self::Negado->value,
            self::Concluido->value,
        ];
    }
}