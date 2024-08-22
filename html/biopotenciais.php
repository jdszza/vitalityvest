<?php
session_start(); // Inicia a sessão

if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php'); // Redireciona para a página de login
    exit();
}

require_once "../php/biopotenciais.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../css/biostyle.css" />
    <title>VitalityVest</title>
</head>
<body>
    <header>
        <a href="perfil.php">
            <input class="menu-button" src="../img/usuario-de-perfil.png" type="image" alt="Profile">
        </a>
    </header>

    <!-- Biopotenciais/Queda Screen -->
    <div id="biopotenciais-screen">
        <div>
            <img src="../img/reply-logo.png" alt="Reply" id="logo-bio" />
        </div>
        <h2>Olá, <?php echo htmlspecialchars($_SESSION['user_name']); ?>, tudo bem?</h2>
        <div class="card" id="batimento">
            <p><?php echo $batimentos; ?> BPM</p>
            <img src="../img/heart-icon.png" alt="Heart Icon" id="coracao-img" />
        </div>
        <section>
            <div class="card" id="temperatura">
                <p><?php echo $temperatura; ?> °C</p>
                <img src="../img/temp-icon.png" alt="Temperature Icon" id="temperatura-img" />
            </div>
            <div class="card" id="giroscopio">
                <img src="../img/giro-parado.png" alt="Stop Icon" id="giroscopio-img" />
            </div>
        </section>
        <section>
            <div class="card" id="fadiga">
                <img src="../img/fadiga.png" alt="Fadiga Icon" id="fadiga-img" />
            </div>
            <div class="card" id="ataque_panico">
                <img src="../img/ataque-panico.png" alt="Panic Icon" id="panico-img" />
            </div>
        </section>
    </div>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <a href="./biopotenciais.php" class="button">
            <div id="nav1">
                <img src="../img/biopotenselect.png" alt="Biopotenciais Icon" class="biopotenciais-icon-select" />
                <p id="textnav">Biopotenciais</p>
            </div>
        </a>
        <a href="./emergencia.php" class="button">
            <div id="nav2">
                <img src="../img/emergencianoselect.png" alt="Emergência Icon" class="emergencia-icon-select" />
                <p id="textnav">Emergência</p>
            </div>
        </a>
        <a href="./dicas.php" class="button">
            <div id="nav3">
                <img src="../img/dicasnoselect.png" alt="Dicas Icon" class="biopotenciais-icon-select" />
                <p id="textnav">Dicas</p>
            </div>
        </a>
    </nav>
    <script src="../js/script.js"></script>
</body>
</html>
