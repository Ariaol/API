<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'atendente',
        'observacao',
        'id_setors'
    ];

    public function setor() {
        return $this->hasOne(Setor::class, 'id', 'id_setors');
    }

    public function solicitacao() {
        return $this->belongsTo(Solicitacao::class);
    }
}
