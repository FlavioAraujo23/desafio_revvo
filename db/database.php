<?php
$config = parse_ini_file('config.env');
$dbHost = $config['DB_HOST'];
$dbPort = $config['DB_PORT'];
$dbName = $config['DB_NAME'];
$dbUser = $config['DB_USER'];
$dbPass = $config['DB_PASS'];


try {
    $pdo = new PDO(
        "mysql:host=$dbHost;port=$dbPort;dbname=$dbName;charset=utf8",
        $dbUser,
        $dbPass
    );
} catch (PDOException $pe) {
    die("Não foi possivel conectar-se ao banco $dbName :" . $pe->getMessage());
}