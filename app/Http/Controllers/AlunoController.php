<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlunoController extends Controller
{
    public function index()
    {
        $aluno = Aluno::all();
        return response()->json([
            'data' => $aluno
        ], 200);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'matricula' => 'required|string|max:50',
            'id_cursos' => 'required|exists:cursos,id'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validate->errors()
            ]);
        }
        $aluno = Aluno::create($request->all());
        return response()->json([
            'message' => 'Deu certo',
            'data' => $aluno
        ], 201);
    }

    public function show($id) {
        $aluno = Aluno::find($id);

        if(!$aluno) {
            return response()->json([
                'message' => 'Não encontrado.'
            ], 404);
        }
        return response()->json([
            'data' => $aluno
        ], 200);
    }

    public function update(Request $request, $id) {
        $aluno = Aluno::find($id);

        if(!$aluno) {
            return response()->json([
                'message' => 'Não deu certo'
            ], 404);
        }

        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $aluno->update($request->all());

        return response()->json([
            'message' => 'Deu certo',
            'data' =>$aluno
        ], 200);
    }

    public function destroy($id) {
        $aluno = Aluno::find($id);

        if(!$aluno) {
            return response()->json([

                'message' => 'Não apagou'
            ], 404);
        }

        $aluno->delete();

        return response()->json([
            'message' => 'Apagou'
        ], 200);
    }
}
