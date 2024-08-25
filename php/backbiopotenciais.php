<?php
require_once 'conn.php';

// Obtém os dados do usuário
$user_id = $_SESSION['user_id'];

// Consulta SQL para obter dados do fone de ouvido, da cinta e da situação do giroscópio
$query = "SELECT batimentos_cardiacos, temperatura_corporal, situacao_mpu 
          FROM sensores WHERE id_usuario = ? 
          ORDER BY data_registro DESC LIMIT 1";

// Preparação da consulta
$stmt = $sql->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se os dados foram encontrados
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $batimentos = htmlspecialchars($row['batimentos_cardiacos']);
    $temperatura = htmlspecialchars($row['temperatura_corporal']);
    $situacao_mpu = htmlspecialchars($row['situacao_mpu']);
} else {
    $batimentos = "[Dados não disponíveis]";
    $temperatura = "[Dados não disponíveis]";
    $situacao_mpu = "[Dados não disponíveis]";
}

$stmt->close();
$sql->close();

// Define a imagem com base na situação do giroscópio
$image_src = "";
if ($situacao_mpu == "Movimento") {
    $image_src = "../img/giro-andando.png";  // Substitua pelo caminho correto da imagem
} elseif ($situacao_mpu == "Parado") {
    $image_src = "../img/giro-parado.png";  // Substitua pelo caminho correto da imagem
} elseif ($situacao_mpu == "Queda") {
    $image_src = "../img/giro-caindo.png";  // Substitua pelo caminho correto da imagem
} else {
    $image_src = "../img/indisponivel.png";  // Imagem padrão caso não haja dados
}