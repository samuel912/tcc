<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            margin-bottom: 20px;
            background-color: #343a40;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .container {
            max-width: 1200px;
        }
        .table-responsive {
            margin-top: 20px;
        }
        .btn-home {
            margin-right: 10px;
        }
        .nav-link {
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
        }
        .btn-voltar {
            margin-left: auto; /* Alinha o botão à direita */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="home.php" class="btn btn-primary btn-home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="exercicios.php">Exercícios</a>
                    </li>
                </ul>
                <a href="javascript:history.back()" class="btn btn-secondary btn-voltar">Voltar</a> <!-- Botão Voltar -->
            </div>
        </div>
    </nav>

    <div class="container">
        <h2 class="text-center mb-4">Gerenciamento de Usuários</h2>
        
        <?php
        require 'banco.php';

        // Exibir mensagens de sucesso/erro
        if (isset($_SESSION['mensagem'])) {
            echo '<div class="alert alert-success">'.htmlspecialchars($_SESSION['mensagem']).'</div>';
            unset($_SESSION['mensagem']);
        }
        if (isset($_SESSION['erro'])) {
            echo '<div class="alert alert-danger">'.htmlspecialchars($_SESSION['erro']).'</div>';
            unset($_SESSION['erro']);
        }

        $usuarios = []; // Inicializa a variável

        try {
            $stmt = $pdo->query("SELECT id, nome, email FROM usuarios ORDER BY id DESC");
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (empty($usuarios)) {
                echo '<div class="alert alert-warning">Nenhum usuário encontrado.</div>';
            }

        } catch (PDOException $e) {
            echo '<div class="alert alert-danger">Erro ao carregar usuários: '.htmlspecialchars($e->getMessage()).'</div>';
        }
        ?>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($usuarios)): ?>
                        <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?= htmlspecialchars($usuario['id']) ?></td>
                            <td><?= htmlspecialchars($usuario['nome']) ?></td>
                            <td><?= htmlspecialchars($usuario['email']) ?></td>
                            <td>
                                <a href="editar_usuarios.php?id=<?= $usuario['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="excluir_usuarios.php?id=<?= $usuario['id'] ?>" 
                                   class="btn btn-danger btn-sm" 
                                   onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
