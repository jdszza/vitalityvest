<?php
session_start(); // Inicia a sessão
require_once 'conn.php'; // Inclui o arquivo de conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica se o formulário foi enviado
    $email = mysqli_real_escape_string($sql, $_POST['email']);
    $senha = mysqli_real_escape_string($sql, $_POST['senha']);

    // Prepara a consulta para evitar SQL Injection
    $stmt = $sql->prepare("SELECT * FROM usuarios WHERE Email = ? AND Senha = ?");
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Login bem-sucedido
        $user = $result->fetch_assoc();

        // Armazena todos os dados do usuário na sessão
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nome'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_senha'] = $user['senha'];
        $_SESSION['user_data_nascimento'] = $user['data_nascimento'];
        $_SESSION['user_sexo'] = $user['sexo'];
        $_SESSION['user_altura'] = $user['altura'];
        $_SESSION['user_peso'] = $user['peso'];
        $_SESSION['user_endereco'] = $user['endereco'];
        $_SESSION['user_contato_emergencia'] = $user['contato_emergencia'];
        $_SESSION['user_cargo'] = $user['cargo'];
        $_SESSION['user_setor'] = $user['setor'];
        $_SESSION['user_avatar'] = $user['avatar'];
        $_SESSION['user_qrcode'] = $user['qrcode'];
        header('Location: ../html/biopotenciais.php'); // Redireciona para a página principal
        exit();
    } else {
        // Login falhou
        echo '<script>alert("Email ou senha incorretos. Tente novamente."); window.location.href = "../index.html";</script>';
    }

    $stmt->close(); // Fecha a consulta
}

$sql->close(); // Fecha a conexão com o banco de dados
