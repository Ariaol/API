<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    // Token do Moodle
    protected $moodleToken = 'd1d728e6fe381885c0f5990e967739c7';

    public function login(Request $request)
    {
        
        $request->validate([
            'username' => 'required|string',
        ]);

        // Enviar a requisição ao endpoint do Moodle para consultar o usuário
        $response = Http::get('http://localhost/moodle/webservice/rest/server.php', [
            'wstoken' => $this->moodleToken,  // Usar o token fixo
            'wsfunction' => 'core_user_get_users',  // Função para buscar usuários
            'moodlewsrestformat' => 'json',
            'criteria[0][key]' => 'username',
            'criteria[0][value]' => $request->username,
        ]);

        // Verificar se a resposta foi bem-sucedida
        if ($response->successful()) {
            $userData = $response->json();

            if (isset($userData['users'][0])) {
                // Se o usuário for encontrado, redireciona para o menu com sucesso
                return redirect()->route('menu')->with([
                    'status' => 'success',
                    'user' => $userData['users'][0],
                ]);
            }

            // Caso o usuário não seja encontrado
            return response()->json([
                'status' => 'error',
                'message' => 'User not found on Moodle',
            ], 404);
        }

        // Caso falha ao buscar os dados do usuário
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to fetch user data from Moodle',
        ], 500);
    }
}
