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
    $toast = [
        'text' => 'Slide excluido com sucesso!',
        'type' => 'success',
        'duration' => 4000
    ];
    setcookie('toast', json_encode($toast), time() + 10, '/');

    header('Location: /');
    exit;
} else {
    $toast = [
        'text' => "Erro ao excluir Slide" . $stmt->error,
        'type' => 'error',
        'duration' => 4000
    ];
    setcookie('toast', json_encode($toast), time() + 10, '/');

    header('Location: /');
    exit;
}

?>