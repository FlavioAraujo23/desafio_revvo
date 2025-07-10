<?php

require '../db/database.php';

if (!isset($_GET['id'])) {
    echo "Erro ao excluir curso";
    exit;
}

$id = $_GET["id"];

$stmt = $conn->prepare("DELETE FROM cursos WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Curso excluido com sucesso";
    header("Location: /");
} else {
    echo "Erro ao excluir curso" . $stmt->error;
}

?>