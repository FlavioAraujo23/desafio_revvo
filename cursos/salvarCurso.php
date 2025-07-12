<?php

require "../includes/functions.php";

$data = [
    "titulo" => $_POST["titulo"],
    "descricao" => $_POST["descricao"],
    "link" => $_POST["linkbtn"]
];

$res = create('Curso', $data);


$toast = [
    'text' => $res['mensagem'],
    'type' => $res['status'],
    'duration' => 4000
];
setcookie('toast', json_encode($toast), time() + 10, '/');

header('Location: /');
exit;

?>