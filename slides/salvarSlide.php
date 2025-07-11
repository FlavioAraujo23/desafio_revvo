<?php
require '../db/database.php';

$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];
$link = $_POST["linkbtn"];

//Tratamento da imagem
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $nomeTemp = $_FILES['imagem']['tmp_name'];
    $nomeFinal = "uploads/" . uniqid() . "-" . $_FILES['imagem']["name"];

    // Cria a pasta caso ela não exista
    if (!is_dir('uploads')) {
        mkdir('uploads', 0755, true);
    }

    if (move_uploaded_file($nomeTemp, $nomeFinal)) {
        $stmt = $conn->prepare("INSERT INTO slides (imagem, titulo, descricao, link) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nomeFinal, $titulo, $descricao, $link);
        if ($stmt->execute()) {
            $toast = [
                'text' => 'Slide salvo com sucesso!',
                'type' => 'success',
                'duration' => 4000
            ];
            setcookie('toast', json_encode($toast), time() + 10, '/');

            header('Location: /');
            exit;
        } else {
            $toast = [
                'text' => 'Erro ao salvar o Slide' . $stmt->error,
                'type' => 'error',
                'duration' => 4000
            ];
            setcookie('toast', json_encode($toast), time() + 10, '/');

            header('Location: /');
            exit;
        }
    }

}