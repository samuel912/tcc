<?php
session_start();
require 'banco.php';
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.html");
    exit;
}
try {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    
    if ($id === false || $id === null) {
        throw new Exception('ID inválido');
    }
    $sql = "DELETE FROM usuarios WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        $_SESSION['mensagem'] = 'Usuário excluído com sucesso';
    } else {
        $_SESSION['erro'] = 'Falha ao excluir usuário';
    }
    
} catch (PDOException $e) {
    $_SESSION['erro'] = 'Erro no banco de dados: ' . $e->getMessage();
} catch (Exception $e) {
    $_SESSION['erro'] = $e->getMessage();
}
header("Location: admin.php");
exit;
?>
