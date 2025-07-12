<?php

require "../includes/functions.php";

$data = [
    "titulo" => $_POST["titulo"],
    "descricao" => $_POST["descricao"],
    "link" => $_POST["linkbtn"]
];
$id = $_POST["id"];

$res = update('Slide', $data, $id);


$toast = [
    'text' => $res['mensagem'],
    'type' => $res['status'],
    'duration' => 4000
];
setcookie('toast', json_encode($toast), time() + 10, '/');

header('Location: /');
exit;

?>