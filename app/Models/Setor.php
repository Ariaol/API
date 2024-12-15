<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    use HasFactory;

    protected $fillable =[
        'nome',
    ];

    public function atendimento() {
        return $this->belongsTo(Atendimento::class);
    }
}
