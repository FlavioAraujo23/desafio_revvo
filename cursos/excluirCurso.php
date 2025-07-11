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
    $toast = [
        'text' => 'Curso excluido com sucesso!',
        'type' => 'success',
        'duration' => 4000
    ];
    setcookie('toast', json_encode($toast), time() + 10, '/');

    header('Location: /');
    exit;
} else {
    $toast = [
        'text' => "Erro ao excluir curso" . $stmt->error,
        'type' => 'error',
        'duration' => 4000
    ];
    setcookie('toast', json_encode($toast), time() + 10, '/');

    header('Location: /');
    exit;
}

?>