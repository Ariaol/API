<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Painel do Aluno</title>
    <style>
        .d-flex {
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            flex-shrink: 0;
            background: rgb(3, 0, 70);
            overflow-y: auto;
        }

        .main-content {
            flex-grow: 1;
            overflow-y: auto;
        }
    </style>


</head>

<body>
    <div class="d-flex">
        <!-- Menu Lateral -->
        <div class="sidebar text-white p-4" style="width: 250px; background-color: #030e34;">
            <div class="mb-5 text-center">
                <h4>Painel do Aluno</h4>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white">
                        <i class="fas fa-home"></i> Início
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white">
                        <i class="fas fa-file-alt"></i> Histórico
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#requerimentoModal">
                        <i class="fas fa-plus-circle"></i> Solicitação
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white">
                        <i class="fas fa-cogs"></i> Configurações
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white">
                        <i class="fas fa-clock"></i> Pendentes
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white">
                        <i class="fas fa-paper-plane"></i> Enviados
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white">
                        <i class="fas fa-check-circle"></i> Respondidos
                    </a>
                </li>
            </ul>
        </div>

        <!-- Conteúdo Principal -->
        <div class="main-content flex-grow-1 p-4">
            <h2>Histórico de Requerimentos</h2>
            <div class="card mb-5">
                <div class="card-header">Solicitações Anteriores</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <th>Tipo</th>
                                <th>Arquivo</th>
                                <th>Comentário</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dados fictícios, substitua por dados dinâmicos -->
                            <tr>

                                <td>Declaraçao</td>
                                <td><a href="#">Ver Arquivo</a></td>
                                <td>Declaração para estagio</td>
                                <td>01/01/2024 12:00</td>
                            </tr>
                            <tr>

                                <td>Trancamento</td>
                                <td><a href="#">Ver Arquivo</a></td>
                                <td>Realizar trancamento</td>
                                <td>02/01/2024 13:30</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal para Solicitar Requerimento -->
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requerimentoModal">
                Solicitar Requerimento
            </button>

            <div class="modal fade" id="requerimentoModal" tabindex="-1" aria-labelledby="requerimentoModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="requerimentoModalLabel">Novo Requerimento</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('solicitacao.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="nomeRequerente" class="form-label">Nome do Requerente</label>
                                    <input type="text" class="form-control" id="nomeRequerente" name="nome_requerente">
                                </div>

                                <div class="mb-3">
                                    <label for="matricula" class="form-label">Matrícula</label>
                                    <input type="text" class="form-control" id="matricula" name="matricula">
                                </div>

                                @csrf
                                <div class="mb-3">
                                    <label for="curso" class="form-label">Curso</label>
                                    <select class="form-select" id="curso" name="id_cursos" required>
                                        <option value="">Selecione</option>
                                        @foreach(\App\Enums\CursoEnum::cases() as $curso)
                                        <option value="{{ $curso->value }}">{{ $curso->value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="tipo" class="form-label">Tipo</label>
                                    <select class="form-select" id="tipo" name="tipo" required>
                                        <option value="">Selecione</option>
                                        @foreach(\App\Enums\TipoEnum::cases() as $tipo)
                                        <option value="{{ $tipo->value }}">{{ $tipo->value }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="mb-3">
                                    <label for="arquivos" class="form-label">Enviar Arquivo</label>
                                    <input type="file" class="form-control" id="arquivo" name="arquivo" rows="3" required>
                                </div>
                                <div class="mb-3">
                                    <label for="descricao" class="form-label">Descrição do Requerimento</label>
                                    <textarea class="form-control" id="descricao" name="comentario" rows="3" placeholder="Descreva o motivo do requerimento..." required></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Enviar Requerimento</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>