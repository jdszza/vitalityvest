<?php

if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php'); // Redireciona para a página de login
    exit();
}

require_once 'conn.php';

// Obtém os dados do usuário
$user_id = $_SESSION['user_id'];

// Consulta SQL para obter dados do fone de ouvido e da cinta da tabela sensores
$query_sensores = "SELECT batimentos_cardiacos, temperatura_corporal, situacao_mpu 
                   FROM sensores WHERE id_usuario = ? 
                   ORDER BY data_registro DESC LIMIT 1";

// Consulta SQL para obter dados de fadiga e ataque de pânico da tabela neurosky
$query_neurosky = "SELECT fadiga, panico 
                   FROM neurosky WHERE id_usuario = ? 
                   ORDER BY data_registro DESC LIMIT 1";

// Preparação e execução da consulta para sensores
$stmt_sensores = $sql->prepare($query_sensores);
$stmt_sensores->bind_param("i", $user_id);
$stmt_sensores->execute();
$result_sensores = $stmt_sensores->get_result();

// Preparação e execução da consulta para neurosky
$stmt_neurosky = $sql->prepare($query_neurosky);
$stmt_neurosky->bind_param("i", $user_id);
$stmt_neurosky->execute();
$result_neurosky = $stmt_neurosky->get_result();

// Verifica se os dados foram encontrados na tabela sensores
if ($result_sensores->num_rows > 0) {
    $row_sensores = $result_sensores->fetch_assoc();
    $batimentos = htmlspecialchars($row_sensores['batimentos_cardiacos']);
    $temperatura = htmlspecialchars($row_sensores['temperatura_corporal']);
    $situacao_mpu = htmlspecialchars($row_sensores['situacao_mpu']);
} else {
    $batimentos = "[Dados não disponíveis]";
    $temperatura = "[Dados não disponíveis]";
    $situacao_mpu = "[Dados não disponíveis]";
}

// Verifica se os dados foram encontrados na tabela neurosky
if ($result_neurosky->num_rows > 0) {
    $row_neurosky = $result_neurosky->fetch_assoc();
    $fadiga = htmlspecialchars($row_neurosky['fadiga']);
    $ataque_panico = htmlspecialchars($row_neurosky['panico']);
} else {
    $fadiga = "[Dados não disponíveis]";
    $ataque_panico = "[Dados não disponíveis]";
}

$stmt_sensores->close();
$stmt_neurosky->close();
$sql->close();

// Define a imagem com base na situação do giroscópio
$image_src = "";
if ($situacao_mpu == "Andando") {
    $image_src = "../img/giro-andando.png";  
} elseif ($situacao_mpu == "Parado") {
    $image_src = "../img/giro-parado.png";  
} elseif ($situacao_mpu == "Queda") {
    $image_src = "../img/giro-caindo.png";  
} else {
    $image_src = "../img/indisponivel.png";  
}

// Defina as imagens para FADIGA e ATAQUE DE PÂNICO com base nos valores obtidos
$fadiga_img = ($fadiga == "Fadiga") ? "../img/fadiga.png" : "../img/sem-fadiga.png"; 
$panico_img = ($ataque_panico == "Ataque") ? "../img/ataque-panico.png" : "../img/sem-panico.png";  