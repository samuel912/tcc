<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercícios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            color: #333;
        }
        .main {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.05);
            text-align: center;
        }
            .main p {
        text-align: justify;
    }
    .main ul {
    text-align: left;
}

        header {
            background: #ffffff;
            padding: 20px 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .menu {
            max-width: 1000px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            align-items: center;
        }
        .menu h1 {
            color: #5a6cb3;
            font-size: 22px;
        }
        .nav-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .nav-buttons a {
            background-color: #ffafbc;
            color: white;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .nav-buttons a:hover {
            background-color: #f58c9b;
        }
    </style>
</head>
<body>

<header>
    <div class="menu">
        <h1>RESPIRE: O JOGO DA CALMA</h1>
        <div class="nav-buttons">
            <a href="home.php">Início</a>
            <a href="exercicios.php">Exercícios</a>
            <a href="#">Diário</a>
            <a href="#">Músicas</a>
            <a href="logout.php">Sair</a> 
        </div>
    </div>
</header>

<div class="main">
    <h2>Exercícios de Respiração</h2>
    <p>Aqui você encontrará uma variedade de exercícios para ajudar a lidar com a ansiedade.</p>
    <p>Escolha um exercício abaixo:</p>
    <ul>
        <li><a href="#">Exercício 1: Respiração Profunda</a></li>
        <p><p>
        <li><a href="#">Exercício 2: Contagem de Respiração</a></li>
        <p><p>
        <li><a href="#">Exercício 3: Visualização</a></li>
    
    </ul>
</div>

<footer style="text-align: center; padding: 20px 0; background: #f8f9fa; margin-top: 30px;">
    &copy; <?php echo date('Y'); ?> Respire, O jogo da calma
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
