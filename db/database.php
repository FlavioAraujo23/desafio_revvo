<?php
$config = parse_ini_file('./config.env');
$host = $config['host'];
$port = $config['port'];
$db = $config['db'];
$user = $config['user'];
$pass = $config['pass'];


$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
