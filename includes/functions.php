<?php
error_reporting(E_ERROR | E_PARSE); // Suprimir warnings
ini_set('display_errors', 0); // Não mostrar erros na tela

require '../db/database.php';

function verificaType($type): bool
{
    return is_string($type) && in_array(trim($type), ["Slide", "Curso"], true);
}

function create($type, $data = []): array
{
    global $conn;

    if (!verificaType($type)) {
        return [
            "status" => 'error',
            "mensagem" => "Tipo deve ser 'Slide' ou 'Curso'"
        ];
    }

    $titulo = $data["titulo"];
    $descricao = $data["descricao"];
    $link = $data["link"];

    //Tratamento da imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $nomeTemp = $_FILES['imagem']['tmp_name'];
        $nomeFinal = "uploads/" . uniqid() . "-" . $_FILES['imagem']["name"];

        // Cria a pasta caso ela não exista
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/' . ($type === "Slide" ? 'slides' : 'cursos') . '/uploads';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Caminho completo para move_uploaded_file 
        $caminhoCompleto = $uploadDir . '/' . basename($nomeFinal);

        if (move_uploaded_file($nomeTemp, $caminhoCompleto)) {
            try {
                $query = $type === "Slide" ? "INSERT INTO slides (imagem, titulo, descricao, link) VALUES (?, ?, ?, ?)" : "INSERT INTO cursos (imagem, titulo, descricao, link) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ssss", $nomeFinal, $titulo, $descricao, $link);
                if ($stmt->execute()) {
                    return [
                        "status" => "success",
                        "mensagem" => $type . " salvo com sucesso!",
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

function update($type, $data = [], $id): array
{
    global $conn;

    if (!verificaType($type)) {
        return [
            "status" => 'error',
            "mensagem" => "Tipo deve ser 'Slide' ou 'Curso'"
        ];
    }

    $query = $type === "Slide" ? "SELECT imagem FROM slides WHERE id = ?" : "SELECT imagem FROM cursos WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($imagemAntiga);
    $stmt->fetch();
    $stmt->close();

    $titulo = $data["titulo"];
    $descricao = $data["descricao"];
    $link = $data["link"];


    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] !== UPLOAD_ERR_NO_FILE) {
        if ($_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            $nomeTemp = $_FILES['imagem']['tmp_name'];
            $nomeFinal = "uploads/" . uniqid() . "-" . basename($_FILES['imagem']['name']);

            // Caminho completo para upload 
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/' . ($type === "Slide" ? 'slides' : 'cursos') . '/uploads';
            $caminhoCompleto = $uploadDir . '/' . basename($nomeFinal);

            if (move_uploaded_file($nomeTemp, $caminhoCompleto)) {
                $novaImagem = $nomeFinal;

                // Remove a imagem antiga
                if ($imagemAntiga && file_exists($imagemAntiga)) {
                    unlink($imagemAntiga);
                }
            } else {
                return [
                    "status" => "error",
                    "mensagem" => "Erro ao salvar nova imagem.",
                ];
            }
        } else {
            return [
                "status" => "error",
                "mensagem" => "Erro ao fazer upload da imagem: código " . $_FILES['imagem']['error'],
            ];
        }
    } else {
        $novaImagem = $imagemAntiga;
    }
    try {
        $query = $type === "Slide" ? "UPDATE slides SET titulo = ?, descricao = ?, link = ?, imagem = ? WHERE id = ?" : "UPDATE cursos SET titulo = ?, descricao = ?, link = ?, imagem = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssi', $titulo, $descricao, $link, $novaImagem, $id);
        if ($stmt->execute()) {
            return [
                "status" => "success",
                "mensagem" => $type . " atualizado com sucesso!",
            ];
        } else {
            return [
                "status" => 'error',
                "mensagem" => "Erro ao atualizar o " . $type . ":" . $stmt->error
            ];
        }
    } catch (Exception $e) {
        return [
            "status" => 'error',
            "mensagem" => "Erro ao atualizar o " . $type . ":" . $e->getMessage(),
        ];
    }
}

function delete($type, $id): array
{
    global $conn;

    if (!verificaType($type)) {
        return [
            "status" => 'error',
            "mensagem" => "Tipo deve ser 'Slide' ou 'Curso'"
        ];
    }
    try {
        $query = $type === "Slide" ? "DELETE FROM slides WHERE id = ?" : "DELETE FROM cursos WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            return [
                "status" => "success",
                "mensagem" => $type . " excluido com sucesso!",
            ];
        } else {
            return [
                "status" => 'error',
                "mensagem" => "Erro ao excluir o " . $type . ":" . $stmt->error
            ];
        }
    } catch (Exception $e) {
        return [
            "status" => 'error',
            "mensagem" => "Erro ao excluir o " . $type . ":" . $e->getMessage(),
        ];
    }
}

?>