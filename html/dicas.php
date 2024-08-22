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
    <!-- Dicas Screen -->
    <div id="dicas-screen">
        <h2>Dicas:</h2>
        <select name="dicas" id="dicas" onchange="mostrarDica()">
            <option value="default">Selecione uma dica:</option>
            <option value="hemorragia">Compressão de Hemorragias</option>
            <option value="manobra">Manobra de Heimlich</option>
            <option value="rcp">Ressuscitação Cardiopulmonar</option>
            <option value="queimaduras">Tratamento de Queimaduras</option>
            <option value="fraturas">Imobilização de Fraturas</option>
        </select>

        <!-- Conteúdo das dicas -->
        <div id="dica-default" class="dica-content active">
            <h3>Ali em cima você pode selecionar qual o tipo de dica que deseja e assim ver algumas instruções. Faça um
                teste!</h3>
            <img src="../img/setinha.png" alt="seta" id="seta">
            <img src="../img/dica-personagem.png" alt="Personagem Dica" class="personagem-dica" id="personagem-dica">
        </div>

        <div id="dica-hemorragia" class="dica-content">
            <h3>Para comprimir uma hemorragia, use um pano limpo e pressione o local até que o sangramento pare.</h3>
            <img src="../img/hemorragia.png" alt="Hemorragia Dica" class="personagem-dica">
        </div>

        <div id="dica-manobra" class="dica-content">
            <h3>A Manobra de Heimlich é usada para desobstruir vias aéreas de uma pessoa que está engasgada.</h3>
            <img src="../img/heimlich.png" alt="Heimlich Dica" class="personagem-dica">
        </div>

        <div id="dica-rcp" class="dica-content">
            <h3>A RCP consiste em compressões torácicas e ventilação para manter a circulação e respiração da vítima.
            </h3>
            <img src="../img/rcp.jpg" alt="RCP Dica" class="personagem-dica">
        </div>

        <div id="dica-queimaduras" class="dica-content">
            <h3>Para tratar queimaduras, lave a área com água corrente e cubra com um pano limpo.</h3>
            <img src="../img/queimaduras.png" alt="Queimaduras Dica" class="personagem-dica">
        </div>

        <div id="dica-fraturas" class="dica-content">
            <h3>Para imobilizar uma fratura, use uma tala ou improvise com objetos rígidos, evitando mover a área
                afetada.</h3>
            <img src="../img/fraturas.jpg" alt="Fraturas Dica" class="personagem-dica">
        </div>
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
                <img src="../img/emergencianoselect.png" alt="emergencia Icon" class="emergencia-icon-select">
                <p id="textnav">Emergência</p>
            </div>
        </a>
        <a href="#" class="button">
            <div id="nav3">
                <img src="../img/dicasselect.png" alt="Biopotenciais Icon" class="biopotenciais-icon-select">
                <p id="textnav">Dicas</p>
            </div>
        </a>
    </nav>
    <script>
        function mostrarDica() {
            var select = document.getElementById('dicas').value;
            var dicaContents = document.getElementsByClassName('dica-content');

            // Esconde todos os conteúdos de dica
            for (var i = 0; i < dicaContents.length; i++) {
                dicaContents[i].classList.remove('active');
            }

            // Mostra o conteúdo da dica selecionada
            var selectedContent = document.getElementById('dica-' + select);
            if (selectedContent) {
                selectedContent.classList.add('active');
            } else {
                document.getElementById('dica-default').classList.add('active');
            }
        }
    </script>
</body>

</html>