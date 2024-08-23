<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/biostyle.css">
    <title>VitalityVest</title>
    <style>
        /* Estilos para o card de notificação */
        .notification-card {
            display: none;
            /* Inicialmente oculto */
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 15px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            border-radius: 5px;
        }

        .notification-card.success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }

        .notification-card p {
            margin: 0;
        }

        .notification-card button {
            background-color: transparent;
            border: none;
            font-size: 16px;
            cursor: pointer;
            margin-left: 10px;
            color: inherit;
        }

        /* Estilos para o card de confirmação */
        .confirmation-card {
            display: none;
            /* Inicialmente oculto */
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #fff;
            color: #333;
            border: 1px solid #ccc;
            padding: 15px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            border-radius: 5px;
            text-align: center;
        }
    </style>
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

    <!-- Card de Confirmação -->
    <div id="confirmation-card" class="confirmation-card">
        <p>Você tem certeza que deseja ativar a emergência?</p>
        <button id="confirm-emergency">Sim</button>
        <button id="cancel-emergency">Cancelar</button>
    </div>

    <!-- Card de Notificação -->
    <div id="notification-card" class="notification-card">
        <p id="notification-message"></p>
        <button id="close-notification">X</button>
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
    <script src="../js/emergency-script.js"></script>
</body>

</html>