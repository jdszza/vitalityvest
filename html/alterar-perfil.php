<?php
session_start(); // Inicia a sessão
if (!isset($_SESSION['user_id'])) {
    // Se o usuário não estiver logado, redireciona para a página de login
    header('Location: ../index.php');
    exit();
}

require_once "../php/conn.php"; // Inclui a conexão com o banco de dados

// Obter os dados do usuário do banco de dados
$userId = $_SESSION['user_id'];
$stmt = $sql->prepare("SELECT email, peso, endereco, contato_emergencia FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
} else {
    $user = array('email' => '', 'peso' => '', 'endereco' => '', 'contato_emergencia' => '');
}

$stmt->close();
$sql->close();

require_once "../php/backaltperfil.php"; // Inclui o código de processamento do formulário
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/altperfilstyle.css">
    <title>Alterar Perfil - VitalityVest</title>
</head>
<body>
    <header>
        <a href="perfil.php">
            <input class="menu-button" src="../img/xis.png" type="image" alt="Voltar">
        </a>
    </header>
    <div id="alterar-perfil-screen">
        <h2>Alterar Dados</h2>

        <?php if (!empty($erro)) : ?>
            <div class="erro"><?php echo htmlspecialchars($erro); ?></div>
        <?php endif; ?>

        <?php if (!empty($sucesso)) : ?>
            <div class="sucesso"><?php echo htmlspecialchars($sucesso); ?></div>
        <?php endif; ?>

        <form method="post" action="../php/backaltperfil.php" id="alterar-perfil-form">
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

            <label>Peso (kg):</label>
            <input type="number" name="peso" step="0.01" value="<?php echo htmlspecialchars($user['peso']); ?>" required>

            <label>Endereço:</label>
            <input type="text" name="endereco" value="<?php echo htmlspecialchars($user['endereco']); ?>" required>

            <label>Contato de Emergência:</label>
            <input type="text" name="contato_emergencia" value="<?php echo htmlspecialchars($user['contato_emergencia']); ?>" required>

            <button type="submit" id="enviar">Salvar Alterações</button>
        </form>
    </div>

    <script src="../js/altperfilstyle.js"></script>
</body>
</html>
