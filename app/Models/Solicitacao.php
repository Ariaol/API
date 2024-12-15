<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'comentario',
        'id_tipos',
        'id_alunos',
        'id_arquivos',
        'id_atendimentos'
    ];

    public function tipo() {
        return $this->hasOne(Tipo::class, 'id', 'id_tipos');
    }
    public function aluno() {
        return $this->hasOne(Aluno::class, 'id', 'id_alunos');
    }
    public function arquivo() {
        return $this->hasOne(Arquivo::class, 'id', 'id_arquivos');
    }
    public function atendimento() {
        return $this->hasOne(Atendimento::class, 'id', 'id_atendimentos');
    }

    public function historico() {
        return $this->hasMany(Historico::class, 'id', 'id_solicitacaos');
    }
}
