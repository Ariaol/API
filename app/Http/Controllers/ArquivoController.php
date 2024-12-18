<?php

namespace App\Http\Controllers;

use App\Models\Arquivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArquivoController extends Controller
{
    public function index()
    {
        $arquivo = Arquivo::all();
        return response()->json([
            'data' => $arquivo
        ], 200);
    }

    public function upload(Request $request)
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
        $arquivo = Arquivo::create($request->all());
        return response()->json([
            'message' => 'Deu certo',
            'data' => $arquivo
        ], 201);
    }

    public function show($id) {
        $arquivo = Arquivo::find($id);

        if(!$arquivo) {
            return response()->json([
                'message' => 'Não encontrado.'
            ], 404);
        }
        return response()->json([
            'data' => $arquivo
        ], 200);
    }

    public function update(Request $request, $id) {
        $arquivo = Arquivo::find($id);

        if(!$arquivo) {
            return response()->json([
                'message' => 'Não deu certo'
            ], 404);
        }

        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $arquivo->update($request->all());

        return response()->json([
            'message' => 'Deu certo',
            'data' =>$arquivo
        ], 200);
    }

    public function destroy($id) {
        $arquivo = Arquivo::find($id);

        if(!$arquivo) {
            return response()->json([

                'message' => 'Não apagou'
            ], 404);
        }

        $arquivo->delete();

        return response()->json([
            'message' => 'Apagou'
        ], 200);
    }
}
