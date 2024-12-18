<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Tipo;
use App\Models\Arquivo;
use App\Models\Solicitacao;
use Illuminate\Http\Request;

class SolicitacaoAlunoController extends Controller
{
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'comentario' => 'required|string',
            'id_tipos' => 'required|exists:tipos,id', // Tipo de solicitação
            'id_alunos' => 'required|exists:alunos,id', // Aluno deve existir
            'arquivo' => 'nullable|file|mimes:pdf,jpg,png|max:2048', // Arquivo opcional
        ]);

        // Salvar o arquivo, se houver
        $arquivoPath = null;
        if ($request->hasFile('arquivo')) {
            // Salvar o arquivo no diretório público
            $file = $request->file('arquivo');
            $arquivoPath = $file->storeAs('solicitacoes', $file->getClientOriginalName(), 'public');

            // Criar registro na tabela 'arquivos'
            $arquivo = new Arquivo();
            $arquivo->nome = $file->getClientOriginalName();
            $arquivo->caminho = $arquivoPath;
            $arquivo->formato = $file->getClientOriginalExtension();
            $arquivo->tamanho = $file->getSize();
            $arquivo->save();
        }

        // Criar a solicitação e associar ao aluno e ao tipo
        $solicitacao = new Solicitacao();
        $solicitacao->comentario = $request->comentario;
        $solicitacao->id_tipos = $request->id_tipos; // Tipo da solicitação
        $solicitacao->id_alunos = $request->id_alunos; // Aluno que fez a solicitação
        $solicitacao->id_arquivos = $arquivo ? $arquivo->id : null; // Se arquivo foi enviado, associar o ID
        $solicitacao->id_atendimentos = null; // Assumindo que o atendimento será adicionado posteriormente
        $solicitacao->save();

        // Redireciona com sucesso
        return redirect()->route('solicitacoes.index')->with('success', 'Solicitação enviada com sucesso!');
    }

    public function index()
    {
        // Exemplo de como listar as solicitações
        $solicitacoes = Solicitacao::with(['aluno', 'tipo', 'arquivo'])->get();
        return view('solicitacoes.index', compact('solicitacoes'));
    }
}
