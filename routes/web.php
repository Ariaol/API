<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SolicitacaoController;
use App\Http\Controllers\AtendenteController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\SolicitacaoAlunoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Tela de login
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/aluno', function () {
    return view('aluno');
});

// Rota de envio do formulário para autenticar
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

// Rota para criar uma nova solicitação
Route::post('/solicitacao', [SolicitacaoController::class, 'store'])->name('solicitacao.store');

Route::get('/atendente', [AtendenteController::class, 'index']);