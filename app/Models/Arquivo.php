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

    public function solicitacao() {
        return $this->belongsTo(Solicitacao::class);
    }
}
