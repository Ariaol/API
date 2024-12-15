<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('solicitacaos', function (Blueprint $table) {
            $table->id();
            $table->string('comentario');
            $table->unsignedBigInteger('id_tipos');
            $table->unsignedBigInteger('id_alunos');
            $table->unsignedBigInteger('id_arquivos');
            $table->unsignedBigInteger('id_atendimentos');
            $table->foreign('id_tipos')->references('id')->on('tipos');
            $table->foreign('id_alunos')->references('id')->on('alunos');
            $table->foreign('id_arquivos')->references('id')->on('arquivos');
            $table->foreign('id_atendimentos')->references('id')->on('atendimentos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitacaos');
    }
};
