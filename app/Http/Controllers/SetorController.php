<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SetorController extends Controller
{
    public function index()
    {
        $setor = Setor::all();
        return response()->json([
            'data' => $setor
        ], 200);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nome => required|string|max:255',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validate->errors()
            ]);
        }
        $setor = Setor::create($request->all());
        return response()->json([
            'message' => 'Deu certo',
            'data' => $setor
        ], 201);
    }

    public function show($id) {
        $setor = Setor::find($id);

        if(!$setor) {
            return response()->json([
                'message' => 'Não encontrado.'
            ], 404);
        }
        return response()->json([
            'data' => $setor
        ], 200);
    }

    public function update(Request $request, $id) {
        $setor = Setor::find($id);

        if(!$setor) {
            return response()->json([
                'message' => 'Não deu certo'
            ], 404);
        }

        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $setor->update($request->all());

        return response()->json([
            'message' => 'Deu certo',
            'data' =>$setor
        ], 200);
    }

    public function destroy($id) {
        $setor = Setor::find($id);

        if(!$setor) {
            return response()->json([

                'message' => 'Não apagou'
            ], 404);
        }

        $setor->delete();

        return response()->json([
            'message' => 'Apagou'
        ], 200);
    }
}
