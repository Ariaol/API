<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CursoController extends Controller
{
    public function index()
    {
        $curso = Curso::all();
        return response()->json([
            'data' => $curso
        ], 200);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nome => required|string|in:sistemas,redes,engenharia',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validate->errors()
            ]);
        }
        $curso = Curso::create($request->all());
        return response()->json([
            'message' => 'Deu certo',
            'data' => $curso
        ], 201);
    }

    public function show($id) {
        $curso = Curso::find($id);

        if(!$curso) {
            return response()->json([
                'message' => 'Não encontrado.'
            ], 404);
        }
        return response()->json([
            'data' => $curso
        ], 200);
    }

    public function update(Request $request, $id) {
        $curso = Curso::find($id);

        if(!$curso) {
            return response()->json([
                'message' => 'Não deu certo'
            ], 404);
        }

        $request->validate([
             'nome => required|string|in:sistemas,redes,engenharia',
        ]);

        $curso->update($request->all());

        return response()->json([
            'message' => 'Deu certo',
            'data' =>$curso
        ], 200);
    }

    public function destroy($id) {
        $curso = Curso::find($id);

        if(!$curso) {
            return response()->json([

                'message' => 'Não apagou'
            ], 404);
        }

        $curso->delete();

        return response()->json([
            'message' => 'Apagou'
        ], 200);
    }
}
