<?php

namespace App\Http\Controllers;

use App\Models\Historico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HistoricoController extends Controller
{
    public function index()
    {
        $historico = Historico::all();
        return response()->json([
            'data' => $historico
        ], 200);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'status' => 'required|string|in:analise,negado,aprovado,concluido',
            'id_solicitacaos' => 'required|exists:solicitacaos,id',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validate->errors()
            ]);
        }
        $historico = Historico::create($request->all());
        return response()->json([
            'message' => 'Deu certo',
            'data' => $historico
        ], 201);
    }

    public function show($id) {
        $historico = Historico::find($id);

        if(!$historico) {
            return response()->json([
                'message' => 'Não encontrado.'
            ], 404);
        }
        return response()->json([
            'data' => $historico
        ], 200);
    }

    public function update(Request $request, $id) {
        $historico = Historico::find($id);

        if(!$historico) {
            return response()->json([
                'message' => 'Não deu certo'
            ], 404);
        }

        $request->validate([
            'status' => 'required|string|in:analise,aprovado,negado,concluido ',
        ]);

        $historico->update($request->all());

        return response()->json([
            'message' => 'Deu certo',
            'data' =>$historico
        ], 200);
    }

    public function destroy($id) {
        $historico = Historico::find($id);

        if(!$historico) {
            return response()->json([

                'message' => 'Não apagou'
            ], 404);
        }

        $historico->delete();

        return response()->json([
            'message' => 'Apagou'
        ], 200);
    }
}
