<?php
session_start(); // Inicia a sessão
if (!isset($_SESSION['user_id'])) {
    // Se o usuário não estiver logado, redireciona para a página de login
    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/biostyle.css">
    <title>VitalityVest</title>
</head>

<body>
    <header>
        <a href="perfil.php">
            <input class="menu-button" src="../img/usuario-de-perfil.png" type="image">
            </input>
        </a>
    </header>
    <!-- Emergência Screen -->
    <div id="emergencia-screen" class="hidden">
        <div>
            <img src="../img/samisaude_logo.jpg" alt="Reply" id="logo-emerg" />
        </div>
        <h2>Precisa de ajuda? <br>Aperte o botão abaixo:</h2>
        <button class="emergency-button">
            <img src="../img/emergency-icon.png" alt="Emergency Button" id="emergency-icon">
        </button>
    </div>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <a href="./biopotenciais.php" class="button">
            <div id="nav1">
                <img src="../img/biopotennoselect.png" alt="Biopotenciais Icon" class="biopotenciais-icon-select">
                <p id="textnav">Biopotênciais</p>
            </div>
        </a>
        <a href="./emergencia.php" class="button">
            <div id="nav2">
                <img src="../img/emergenciaselect.png" alt="emergencia Icon" class="emergencia-icon-select">
                <p id="textnav">Emergência</p>
            </div>
        </a>
        <a href="./dicas.php" class="button">
            <div id="nav3">
                <img src="../img/dicasnoselect.png" alt="Biopotenciais Icon" class="biopotenciais-icon-select">
                <p id="textnav">Dicas</p>
            </div>
        </a>
    </nav>
    <script src="js/script.js"></script>
</body>

</html>