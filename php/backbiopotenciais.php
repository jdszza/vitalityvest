<?php
require_once 'conn.php';

// Obtém os dados do usuário
$user_id = $_SESSION['user_id'];

// Consulta SQL para obter dados do fone de ouvido e da cinta
$query = "SELECT batimentos_cardiacos, temperatura_corporal FROM sensores WHERE id_usuario = ?";

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
} else {
    $batimentos = "[Dados não disponíveis]";
    $temperatura = "[Dados não disponíveis]";
}

$stmt->close();
$sql->close();
