<?php
require_once 'conn.php'; // Certifique-se de que este arquivo contém a conexão MySQL

// Verificar se a sessão já foi iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

// Inicializar variáveis
$erro = '';
$sucesso = '';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $peso = trim($_POST['peso']);
    $endereco = trim($_POST['endereco']);
    $contato_emergencia = trim($_POST['contato_emergencia']);

    $userId = $_SESSION['user_id'];

    // Preparar e executar a atualização dos dados do usuário
    $stmt = $sql->prepare("UPDATE usuarios SET email = ?, peso = ?, endereco = ?, contato_emergencia = ? WHERE id = ?");
    $stmt->bind_param("sdssi", $email, $peso, $endereco, $contato_emergencia, $userId);

    if ($stmt->execute()) {
        $sucesso = "Dados atualizados com sucesso!";
    } else {
        $erro = "Erro ao atualizar os dados.";
    }

    $stmt->close();
    $sql->close();

    // Redirecionar para a página de perfil ou onde for necessário
    header("Location: ../html/perfil.php");
    exit();
}