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
            left: 50%;
            transform: translateX(-50%);
            width: 300px;
            /* Ajuste de largura */
            background-color: #d4edda;
            /* Cor de fundo verde claro */
            color: #155724;
            /* Texto verde escuro */
            border: 1px solid #c3e6cb;
            padding: 15px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            /* Sombra suave */
            z-index: 1000;
            border-radius: 10px;
            /* Bordas arredondadas */
            font-size: 16px;
            text-align: center;
            animation: fadeIn 0.5s ease, fadeOut 0.5s 3s ease;
            /* Animação de entrada e saída */
        }

        /* Animação de fade */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .notification-card.success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }

        .notification-card p {
            margin: 0;
            font-size: 16px;
        }

        .notification-card button {
            background-color: transparent;
            border: none;
            font-size: 16px;
            cursor: pointer;
            margin-left: 10px;
            color: inherit;
            font-weight: bold;
        }


        /* Estilos para o card de confirmação */
        .confirmation-card {
            display: none;
            /* Inicialmente oculto */
            position: fixed;
            bottom: 50%;
            left: 50%;
            transform: translate(-50%, 50%);
            width: 350px;
            /* Aumenta a largura para melhor legibilidade */
            height: auto;
            /* Altura automática para ajustar ao conteúdo */
            background-color: #ffffff;
            /* Mantém o fundo branco para contraste */
            color: #333;
            border: 1px solid #ccc;
            padding: 20px;
            /* Aumenta o padding para espaçamento interno */
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            /* Suaviza a sombra */
            z-index: 1000;
            border-radius: 10px;
            /* Bordas mais suaves */
            text-align: center;
            font-size: 18px;
            /* Aumenta o tamanho da fonte */
        }

        /* Estilo para o texto de confirmação */
        .confirmation-card p {
            margin-bottom: 20px;
            font-size: 18px;
            color: #555;
        }

        /* Estilos para os botões */
        .confirmation-card button {
            font-size: 16px;
            padding: 12px 24px;
            /* Botões maiores para melhor interação */
            margin: 5px 10px;
            /* Espaçamento entre os botões */
            border: none;
            border-radius: 5px;
            /* Bordas arredondadas nos botões */
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Estilos para o botão de confirmação */
        #confirm-emergency {
            background-color: #28a745;
            /* Cor verde para indicar ação positiva */
            color: #fff;
        }

        #confirm-emergency:hover {
            background-color: #218838;
            /* Cor mais escura ao passar o mouse */
        }

        /* Estilos para o botão de cancelamento */
        #cancel-emergency {
            background-color: #dc3545;
            /* Cor vermelha para cancelar */
            color: #fff;
        }

        #cancel-emergency:hover {
            background-color: #c82333;
            /* Cor mais escura ao passar o mouse */
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