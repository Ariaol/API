<?php

namespace App\Http\Controllers;

use App\Models\Solicitacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SolicitacaoController extends Controller
{
    public function index()
    {
        $solicitacao = Solicitacao::all();
        return response()->json([
            'data' => $solicitacao
        ], 200);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'comentario' => 'required|string|max:255',
            'id_tipos' => 'required|exists:tipos,id',
            'id_alunos' => 'required|exists:alunos,id',
            'id_arquivos' => 'required|exists:arquivos,id',
            'id_atendimentos' => 'required|exists:atendimentos,id',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validate->errors()
            ]);
        }
        $solicitacao = Solicitacao::create($request->all());
        return response()->json([
            'message' => 'Deu certo',
            'data' => $solicitacao
        ], 201);
    }

    public function show($id) {
        $solicitacao = Solicitacao::find($id);

        if(!$solicitacao) {
            return response()->json([
                'message' => 'Não encontrado.'
            ], 404);
        }
        return response()->json([
            'data' => $solicitacao
        ], 200);
    }

    public function update(Request $request, $id) {
        $solicitacao = Solicitacao::find($id);

        if(!$solicitacao) {
            return response()->json([
                'message' => 'Não deu certo'
            ], 404);
        }

        $request->validate([
            'comentario' => 'required|string|max:255',
        ]);

        $solicitacao->update($request->all());

        return response()->json([
            'message' => 'Deu certo',
            'data' =>$solicitacao
        ], 200);
    }

    public function destroy($id) {
        $solicitacao = Solicitacao::find($id);

        if(!$solicitacao) {
            return response()->json([

                'message' => 'Não apagou'
            ], 404);
        }

        $solicitacao->delete();

        return response()->json([
            'message' => 'Apagou'
        ], 200);
    }
}
