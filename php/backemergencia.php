<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Se o usuário não estiver logado, redireciona para a página de login
    header('Location: ../index.php');
    exit();
}

require_once 'conn.php'; // Inclui a conexão com o banco de dados

try {
    $user_id = $_SESSION['user_id']; // ID do usuário logado

    // Aqui você deve obter o id_localizacao relacionado ao usuário
    $query_location = "SELECT id FROM localizacao WHERE id_usuario = ?";
    $stmt_location = $sql->prepare($query_location);
    
    if ($stmt_location) {
        $stmt_location->bind_param('i', $user_id);
        $stmt_location->execute();
        $stmt_location->bind_result($id_localizacao);
        $stmt_location->fetch();
        $stmt_location->close();

        if ($id_localizacao) {
            // Inserir os dados na tabela emergencia
            $query = "INSERT INTO emergencia (id_usuario, id_localizacao, estado, hora) VALUES (?, ?, 1, NOW())";
            $stmt = $sql->prepare($query);

            if ($stmt) {
                $stmt->bind_param('ii', $user_id, $id_localizacao);
                $stmt->execute();
                $stmt->close();
                echo json_encode(['success' => true]);
            } else {
                throw new Exception($sql->error);
            }
        } else {
            throw new Exception('ID de localização não encontrado.');
        }
    } else {
        throw new Exception($sql->error);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}

$sql->close();
?>
