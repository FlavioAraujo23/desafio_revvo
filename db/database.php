<?php
$config = parse_ini_file('config.env');
// $dbHost = $config['DB_HOST'];
// $dbPort = $config['DB_PORT'];
// $dbName = $config['DB_NAME'];
// $dbUser = $config['DB_USER'];
// $dbPass = $config['DB_PASS'];


// $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName, $dbPort);

$host = 'maglev.proxy.rlwy.net';
$port = 32732;
$user = 'root';
$pass = 'aOajNextuAzYVIusqbEBkLjMgOkHipMV';
$db = 'railway';

$conn = new mysqli($host, $user, $pass, $db, $port);

// Verifica conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

