<?php
if (file_exists(__DIR__ . 'config.env')) {
    $config = parse_ini_file(__DIR__ . 'config.env');
    $host = $config['host'] ?? 'localhost';
    $port = $config['port'] ?? 3306;
    $db = $config['db'] ?? 'desafio_revvo';
    $user = $config['user'] ?? 'root';
    $pass = $config['pass'] ?? '';
} else {
    // Usar variáveis de ambiente (para Docker/Coolify)
    $host = $_ENV['DB_HOST'] ?? getenv('DB_HOST') ?? 'mysql';
    $port = $_ENV['DB_PORT'] ?? getenv('DB_PORT') ?? 3306;
    $db = $_ENV['DB_NAME'] ?? getenv('DB_NAME') ?? 'desafio_revvo';
    $user = $_ENV['DB_USER'] ?? getenv('DB_USER') ?? 'root';
    $pass = $_ENV['DB_PASS'] ?? getenv('DB_PASS') ?? 'password';
}

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
