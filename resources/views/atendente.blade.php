<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Atendente</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
        <div class="sidebar text-white p-4" style="width: 250px;">
            <div class="mb-5 text-center">
            <h4>Painel do Atendente</h4>
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
        <div class="main-content  flex-grow-1 p-4">
            <h2>Requerimentos</h2>

            <!-- Pendentes -->
            <section id="pendentes" class="mb-5">
                <h4>Pendentes</h4>
                <div class="card mb-5">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Requerente</th>
                                    <th>Curso</th>
                                    <th>Tipo</th>
                                    <th>Data</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Dados fictícios, substitua conforme necessário -->
                                <tr>
                                    <td>1</td>
                                    <td>João Silva</td>
                                    <td>Sistemas para internet</td>
                                    <td>Declaração</td>
                                    <td>01/01/2024 12:00</td>
                                    <td>
                                        <button class="btn btn-success btn-sm">Deferir</button>
                                        <button class="btn btn-danger btn-sm">Indeferir</button>
                                        <button class="btn btn-warning btn-sm">Encaminhar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Ana Souza</td>
                                    <td>Redes de computadores</td>
                                    <td>Trancamento</td>
                                    <td>02/01/2024 13:30</td>
                                    <td>
                                        <button class="btn btn-success btn-sm">Deferir</button>
                                        <button class="btn btn-danger btn-sm">Indeferir</button>
                                        <button class="btn btn-warning btn-sm">Encaminhar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- Enviados -->
            <section id="enviados" class="mb-5">
                <h4>Enviados</h4>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Requerente</th>
                                    <th>Curso</th>
                                    <th>Tipo</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Dados fictícios, substitua conforme necessário -->
                                <tr>
                                    <td>3</td>
                                    <td>Lucas Pereira</td>
                                    <td>Sistemas para internet</td>
                                    <td>Declaração</td>
                                    <td>03/01/2024 14:00</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Fernanda Costa</td>
                                    <td>Redes de computadores</td>
                                    <td>Trancamento</td>
                                    <td>04/01/2024 15:15</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- Respondidos -->
            <section id="respondidos">
                <h4>Respondidos</h4>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Requerente</th>
                                    <th>Curso</th>
                                    <th>Tipo</th>
                                    <th>Status</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Dados fictícios, substitua conforme necessário -->
                                <tr>
                                    <td>5</td>
                                    <td>Marcos Oliveira</td>
                                    <td>Sistemas para internet</td>
                                    <td>Declaração</td>
                                    <td>Deferido</td>
                                    <td>05/01/2024 16:30</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Carla Mendes</td>
                                    <td>Redes de computadores</td>
                                    <td>Trancamento</td>
                                    <td>Indeferido</td>
                                    <td>06/01/2024 17:45</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
