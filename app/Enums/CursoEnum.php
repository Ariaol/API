<?php

namespace App\Enums;

enum CursoEnum : string {
    case Sistemas = 'Sistemas para Internet';
    case Redes = 'Redes de Computadores';
    case Engenharia = 'engenharia da Computação';

    public static function active(): array
    {
        return [
            self::Sistemas->value,
            self::Redes->value,
            self::Engenharia->value,
        ];
    }
}