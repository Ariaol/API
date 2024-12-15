<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AtendimentoController extends Controller
{
    public function index()
    {
        $atendimento = Atendimento::all();
        return response()->json([
            'data' => $atendimento
        ], 200);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'atendente'=> 'required|string|max:255',
            'observacao' => 'required|string|max:50',
            'id_setors' => 'required|exists:cursos,id'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validate->errors()
            ]);
        }
        $atendimento = Atendimento::create($request->all());
        return response()->json([
            'message' => 'Deu certo',
            'data' => $atendimento
        ], 201);
    }

    public function show($id) {
        $atendimento = Atendimento::find($id);

        if(!$atendimento) {
            return response()->json([
                'message' => 'Não encontrado.'
            ], 404);
        }
        return response()->json([
            'data' => $atendimento
        ], 200);
    }

    public function update(Request $request, $id) {
        $atendimento = Atendimento::find($id);

        if(!$atendimento) {
            return response()->json([
                'message' => 'Não deu certo'
            ], 404);
        }

        $request->validate([
            'atendente' => 'required|string|max:255',
        ]);

        $atendimento->update($request->all());

        return response()->json([
            'message' => 'Deu certo',
            'data' =>$atendimento
        ], 200);
    }

    public function destroy($id) {
        $atendimento = Atendimento::find($id);

        if(!$atendimento) {
            return response()->json([

                'message' => 'Não apagou'
            ], 404);
        }

        $atendimento->delete();

        return response()->json([
            'message' => 'Apagou'
        ], 200);
    }
}
