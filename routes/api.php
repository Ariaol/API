<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\FileUploadController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/upload', [FileUploadController::class, 'uploadFile']);

Route::get('/menu', [MenuController::class, 'index'])->name('menu');

Route::post('/teste', [AuthController::class, 'teste'])->middleware(); //para restringir acesso.
Route::post('/teste', [AuthController::class, 'teste'])->middleware('auth:sanctum'); //somente usuarios com token válido.

Route::middleware('auth:sanctum')->group(function () {
    //Agrupa rotas para serem protegidas
});

Route::post('/login', [AuthController::class, 'login']);

Route::get('/users', [UserController::class, 'index']);

Route::get('/curso', [CursoController::class, 'index']);
Route::get('/curso/{id}', [CursoController::class, 'show']);
Route::post('/curso', [CursoController::class, 'store']);
Route::put('/curso/{id}', [CursoController::class, 'update']);
Route::delete('/curso/{id}', [CursoController::class, 'destroy']);

Route::get('/setor', [SetorController::class, 'index']);
Route::get('/setor/{id}', [SetorController::class, 'show']);
Route::post('/setor', [SetorController::class, 'store']);
Route::put('/setor/{id}', [SetorController::class, 'update']);
Route::delete('/setor/{id}', [SetorController::class, 'destroy']);

Route::get('/tipo', [TipoController::class, 'index']);
Route::get('/tipo/{id}', [TipoController::class, 'show']);
Route::post('/tipo', [TipoController::class, 'store']);
Route::put('/tipo/{id}', [TipoController::class, 'update']);
Route::delete('/tipo/{id}', [TipoController::class, 'destroy']);

Route::get('/arquivo', [ArquivoController::class, 'index']);
Route::get('/arquivo/{id}', [ArquivoController::class, 'show']);
Route::post('/arquivo', [ArquivoController::class, 'store']);
Route::put('/arquivo/{id}', [ArquivoController::class, 'update']);
Route::delete('/arquivo/{id}', [ArquivoController::class, 'destroy']);

Route::get('/aluno', [AlunoController::class, 'index']);
Route::get('/aluno/{id}', [AlunoController::class, 'show']);
Route::post('/aluno', [AlunoController::class, 'store']);
Route::put('/aluno/{id}', [AlunoController::class, 'update']);
Route::delete('/aluno/{id}', [AlunoController::class, 'destroy']);

Route::get('/atendimento', [AtendimentoController::class, 'index']);
Route::get('/atendimento/{id}', [AtendimentoController::class, 'show']);
Route::post('/atendimento', [AtendimentoController::class, 'store']);
Route::put('/atendimento/{id}', [AtendimentoController::class, 'update']);
Route::delete('/atendimento/{id}', [AtendimentoController::class, 'destroy']);

Route::get('/solicitacao', [SolicitacaoController::class, 'index']);
Route::get('/solicitacao/{id}', [SolicitacaoController::class, 'show']);
Route::post('/solicitacao', [SolicitacaoController::class, 'store']);
Route::put('/solicitacao/{id}', [SolicitacaoController::class, 'update']);
Route::delete('/solicitacao/{id}', [SolicitacaoController::class, 'destroy']);

Route::get('/historico', [HistoricoController::class, 'index']);
Route::get('/historico/{id}', [HistoricoController::class, 'show']);
Route::post('/historico', [HistoricoController::class, 'store']);
Route::put('/historico/{id}', [HistoricoController::class, 'update']);
Route::delete('/historico/{id}', [HistoricoController::class, 'destroy']);



