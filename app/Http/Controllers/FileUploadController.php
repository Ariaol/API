<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function uploadFile(Request $request)
    {
        // Validação do arquivo
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // Máximo 2MB
        ]);

        // Armazenando o arquivo
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Define um nome único para o arquivo
            $filename = time() . '_' . $file->getClientOriginalName();

            // Salva o arquivo em 'storage/app/public/uploads'
            $filePath = $file->storeAs('uploads', $filename, 'public');

            // Retorna a resposta com o caminho do arquivo
            return response()->json([
                'success' => true,
                'message' => 'Arquivo enviado com sucesso!',
                'file_path' => asset('storage/' . $filePath),
            ]);
        }

        // Caso nenhum arquivo seja encontrado
        return response()->json(['success' => false, 'message' => 'Nenhum arquivo enviado!'], 400);
    }
}