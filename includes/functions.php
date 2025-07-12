<?php

require '../db/database.php';

function create($type, $data = []): array
{
    global $conn;

    if (!is_string($type) || !in_array(trim($type), ["Slide", "Curso"], true)) {
        return ["status" => 'error', "mensagem" => "Tipo inválido"];
    }

    $titulo = $data["titulo"];
    $descricao = $data["descricao"];
    $link = $data["linkbtn"];

    //Tratamento da imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $nomeTemp = $_FILES['imagem']['tmp_name'];
        $nomeFinal = "uploads/" . uniqid() . "-" . $_FILES['imagem']["name"];

        // Cria a pasta caso ela não exista
        if (!is_dir('uploads')) {
            mkdir('uploads', 0755, true);
        }

        if (move_uploaded_file($nomeTemp, $nomeFinal)) {
            try {
                $query = $type === "Slide" ? "INSERT INTO slides (imagem, titulo, descricao, link) VALUES (?, ?, ?, ?)" : "INSERT INTO cursos (imagem, titulo, descricao, link) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ssss", $nomeFinal, $titulo, $descricao, $link);
                if ($stmt->execute()) {
                    return [
                        "status" => "success",
                        "mensagem" => $type . "salvo com sucesso!",
                    ];
                } else {
                    return [
                        "status" => 'error',
                        "mensagem" => "Erro ao salvar o" . $type . ":" . $stmt->error
                    ];
                }
            } catch (Exception $e) {
                return [
                    "status" => 'error',
                    "mensagem" => "Erro ao salvar o" . $type . ":" . $e->getMessage(),
                ];
            }
        }

    }

    return [
        "status" => 'error',
        "mensagem" => "Ocorreu um erro com a imagem recebida.",
    ];
}

?>