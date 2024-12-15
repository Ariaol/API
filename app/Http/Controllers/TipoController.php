<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoController extends Controller
{
    public function index()
    {
        $tipos = Tipo::all();

        return response()->json([
            'data' => $tipos,
        ], 200);
    }

    public function store(Request $request)
    {
        // Validação dos dados de entrada
        $validate = Validator::make($request->all(), [
            'tipo' => 'required|string|in:trancamento,declaracao,justificativa', // Tipo válido
        ]);

        // Verificar se a validação falhou
        if ($validate->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validate->errors(),
            ], 400);
        }

        // Criar o registro
        $tipo = Tipo::create([
            'tipo' => $request->input('tipo'),
        ]);

        // Retornar resposta de sucesso
        return response()->json([
            'message' => 'Registro criado com sucesso!',
            'data' => $tipo,
        ], 200);
    }

    public function show($id) {
        $tipo = Tipo::find($id);

        if(!$tipo) {
            return response()->json([
                'message' => 'Não encontrado.'
            ], 404);
        }
        return response()->json([
            'data' => $tipo
        ], 200);
    }

    public function update(Request $request, $id) {
        $tipo = Tipo::find($id);

        if(!$tipo) {
            return response()->json([
                'message' => 'Não deu certo'
            ], 404);
        }

        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $tipo->update($request->all());

        return response()->json([
            'message' => 'Deu certo',
            'data' =>$tipo
        ], 200);
    }

    public function destroy($id) {
        $tipo = Tipo::find($id);

        if(!$tipo) {
            return response()->json([

                'message' => 'Não apagou'
            ], 404);
        }

        $tipo->delete();

        return response()->json([
            'message' => 'Apagou'
        ], 200);
    }
}
