<?php

require '../db/database.php';

if (!isset($_POST)) {
    echo "Nenhum dado enviado";
    exit;
}

$id = $_POST["id"];
$imagem = $_POST["imagem"];
$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];
$link = $_POST["linkbtn"];

$stmt = $conn->prepare("SELECT imagem FROM slides WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($imagemAntiga);
$stmt->fetch();
$stmt->close();

if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] !== UPLOAD_ERR_NO_FILE) {
    if ($_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $nomeTemp = $_FILES['imagem']['tmp_name'];
        $nomeFinal = "uploads/" . uniqid() . "-" . basename($_FILES['imagem']['name']);

        if (move_uploaded_file($nomeTemp, $nomeFinal)) {
            $novaImagem = $nomeFinal;

            // Remove a imagem antiga
            if ($imagemAntiga && file_exists($imagemAntiga)) {
                unlink($imagemAntiga);
            }
        } else {
            $toast = [
                'text' => "Erro ao salvar nova imagem.",
                'type' => 'error',
                'duration' => 4000
            ];
            setcookie('toast', json_encode($toast), time() + 10, '/');

            header('Location: /');
            exit;
        }
    } else {
        $toast = [
            'text' => "Erro ao fazer upload da imagem: código " . $_FILES['imagem']['error'],
            'type' => 'error',
            'duration' => 4000
        ];
        setcookie('toast', json_encode($toast), time() + 10, '/');

        header('Location: /');
        exit;
    }
} else {
    $novaImagem = $imagemAntiga;
}

$stmt = $conn->prepare('UPDATE slides SET titulo = ?, descricao = ?, link = ?, imagem = ? WHERE id = ?');
$stmt->bind_param('ssssi', $titulo, $descricao, $link, $novaImagem, $id);
if ($stmt->execute()) {
    $toast = [
        'text' => 'Slide atualizado com sucesso!',
        'type' => 'success',
        'duration' => 4000
    ];
    setcookie('toast', json_encode($toast), time() + 10, '/');

    header('Location: /');
    exit;
} else {
    $toast = [
        'text' => "Erro ao atualizar Slide" . $stmt->error,
        'type' => 'error',
        'duration' => 4000
    ];
    setcookie('toast', json_encode($toast), time() + 10, '/');

    header('Location: /');
    exit;
}

?>