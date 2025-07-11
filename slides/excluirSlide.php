<?php

require '../db/database.php';

if (!isset($_GET['id'])) {
    echo "Erro ao excluir slide";
    exit;
}

$id = $_GET["id"];

$stmt = $conn->prepare("DELETE FROM slides WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Slide excluido com sucesso";
    header("Location: /");
} else {
    echo "Erro ao excluir Slide" . $stmt->error;
}

?>