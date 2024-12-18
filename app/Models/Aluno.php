<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'matricula',
        'id_cursos'
    ];

    public function curso() {
        return $this->belongsTo(Curso::class, 'id', 'id_cursos');
    }

    public function solicitacao() {
        return $this->hasMany(Solicitacao::class);
    }
}
