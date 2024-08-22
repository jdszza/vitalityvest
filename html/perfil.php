<?php
session_start(); // Inicia a sessão
if (!isset($_SESSION['user_id'])) {
    // Se o usuário não estiver logado, redireciona para a página de login
    header('Location: ../index.php');
    exit();
}
require_once '../php/conn.php';
$stmt = $sql->prepare("SELECT * FROM usuarios WHERE ID = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
$stmt->close();
$sql->close();
$senha_oculta = str_repeat('*', strlen($user['senha']));

$imc = $user['peso'] / ($user['altura'] * $user['altura']);

// Determinando a condição com base no IMC
if ($imc < 18.5) {
    $condicao = "Baixo peso";
} elseif ($imc >= 18.5 && $imc < 24.9) {
    $condicao = "Peso normal";
} elseif ($imc >= 25 && $imc < 29.9) {
    $condicao = "Sobrepeso";
} elseif ($imc >= 30 && $imc < 34.9) {
    $condicao = "Obesidade Grau I";
} elseif ($imc >= 35 && $imc < 39.9) {
    $condicao = "Obesidade Grau II";
} else {
    $condicao = "Obesidade Grau III";
}

$avatar = !empty($_SESSION['user_avatar']) ? $_SESSION['user_avatar'] : '../img/default-avatar.png';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/perfilstyle.css">
    <title>VitalityVest</title>
</head>

<body>
    <!-- Perfil Screen -->
    <header>
        <a href="biopotenciais.php">
            <input class="menu-button" src="../img/xis.png" type="image">
            </input>
        </a>
    </header>
    <div id="perfil-screen">
        <img src="<?php echo htmlspecialchars($avatar); ?>" alt="User Icon" class="profile-icon">
        <h2><?php echo htmlspecialchars($_SESSION['user_name']); ?></h2>
        <h3><?php echo htmlspecialchars($user['cargo']); ?> - <?php echo htmlspecialchars($user['setor']); ?></h3>
        <div class="profile-details">
            <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
            <p>Senha: <?php echo htmlspecialchars($senha_oculta); ?></p>
            <p>Nascimento: <?php echo htmlspecialchars($user['data_nascimento']); ?></p>
            <p>Sexo: <?php echo htmlspecialchars($user['sexo']); ?></p>
            <p>Altura: <?php echo htmlspecialchars($user['altura']); ?>m</p>
            <p>Peso: <?php echo htmlspecialchars($user['peso']); ?>Kg</p>
            <p>IMC: <?php echo round($imc, 2); ?> - <?php echo htmlspecialchars($condicao); ?></p>
            <p>Endereço: <?php echo htmlspecialchars($user['endereco']); ?></p>
            <p>Emergência: <?php echo htmlspecialchars($user['contato_emergencia']); ?></p>
        </div>
        <button class="btn-alterar" onclick="window.location.href='alterar_perfil.php'">Alterar</button>
    </div>

    <script src="../js/script.js"></script>
</body>

</html>