<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'caminho',
        'formato',
        'tamanho',
    ];

    public function solicitacoes()
    {
        return $this->hasMany(Solicitacao::class);
    }
}
