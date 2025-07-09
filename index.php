<?php
require "./db/database.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio Revvo</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>
    <?php include "includes/header.php" ?>
    <?php include "./slide/slide.php" ?>
    <?php include "./cursos/curso.php" ?>
    <?php include "includes/footer.php" ?>
</body>

</html>