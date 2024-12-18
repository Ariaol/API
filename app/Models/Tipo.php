<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TipoEnum;

class Tipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo'
    ];


    protected $casts = [
        'tipo' => TipoEnum::class
    ];

    public function solicitacoes()
    {
        return $this->hasMany(Solicitacao::class);
    }
}