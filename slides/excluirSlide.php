<?php

require "../includes/functions.php";

$id = $_GET["id"];

$res = delete('Slide', $id);

$toast = [
    'text' => $res['mensagem'],
    'type' => $res['status'],
    'duration' => 4000
];
setcookie('toast', json_encode($toast), time() + 10, '/');

header('Location: /');
exit;

?>