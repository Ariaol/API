<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'id_solicitacaos'
    ];


    protected $casts = [
        'status' => StatusEnum::class
    ];

    public function solicitacao() {
        return $this->belongsTo(Solicitacao::class, 'id', 'id_solicitacaos');
    }
}
