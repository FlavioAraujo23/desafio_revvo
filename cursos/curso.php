<?php
require "./MockData/cursosMock.php"
    ?>

<head>
    <link rel="stylesheet" href="assets/css/course.css">
</head>
<main class="main-section">
    <section class="container">
        <h1 class="title">Meus cursos</h1>
        <hr>
        <section class="courses-container grid">
            <?php foreach ($cursos as $curso): ?>
                <div class="card">
                    <img src="<?= $curso['imagem'] ?>" alt="<?= $curso['titulo'] ?>" class="course-image"
                        style="max-width: 320px;">
                    <div class="course-info">
                        <h2 class="course-title"><?= $curso['titulo'] ?></h2>
                        <p class="course-desc"><?= $curso['descricao'] ?></p>
                        <a href="<?= $curso['link'] ?>" class="course-link">Ver curso</a>
                    </div>
                </div>
            <?php endforeach; ?>
            <a href="#"><img src="../images/adicionar_curso.png" alt="" width="320" height="330"><a>
        </section>
    </section>

</main>