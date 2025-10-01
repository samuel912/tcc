<?php
include('banco.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    // Verifica se é cadastro (tem campo 'nome') ou login
    if (isset($_POST['nome'])) {
        // === CADASTRO ===
        $nome = trim($_POST['nome']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "E-mail inválido.";
            exit;
        }

        // Verifica se já existe email cadastrado
        $sql = "SELECT id FROM usuarios WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':email' => $email]);

        if ($stmt->fetch()) {
            echo "E-mail já cadastrado. <a href='login.html'>Entrar</a>";
            exit;
        }

        // Criptografa a senha
        $senha_hash = password_hash($senha, PASSWORD_BCRYPT);

        //  Altere para 1 se quiser cadastrar ADMIN
        $is_admin = 0;

        $sql = "INSERT INTO usuarios (nome, email, senha, is_admin) VALUES (:nome, :email, :senha, :is_admin)";
        $stmt = $pdo->prepare($sql);

        try {
            $stmt->execute([
                ':nome' => $nome,
                ':email' => $email,
                ':senha' => $senha_hash,
                ':is_admin' => $is_admin
            ]);
            echo "Cadastro realizado com sucesso! <a href='login.html'>Entrar</a>";
        } catch (PDOException $e) {
            echo "Erro ao cadastrar: " . $e->getMessage();
        }

    } else {
        // === LOGIN ===
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario'] = $usuario['nome'];
            $_SESSION['admin'] = ($usuario['is_admin'] == 1) ? true : false;

            if ($_SESSION['admin']) {
                header("Location: admin.php");
            } else {
                header("Location: home.php");
            }
            exit;
        } else {
            echo "Login inválido. <a href='login.html'>Tentar novamente</a>";
        }
    }
}
?>
