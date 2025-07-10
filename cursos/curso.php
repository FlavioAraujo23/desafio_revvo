<?php
require_once "./db/database.php";

$stmt = $conn->prepare("SELECT * FROM cursos");
$stmt->execute();
$result = $stmt->get_result();

$cursos = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<?php
require_once 'includes/modal.php';

$modalId = 'modalNovoCurso';

ob_start();

include 'adicionarCurso.php';

$modalContent = ob_get_clean();
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
                    <img src="/cursos/<?= $curso['imagem'] ?>" alt="<?= $curso['titulo'] ?>" class="course-image">
                    <div class="course-info">
                        <h2 class="course-title"><?= $curso['titulo'] ?></h2>
                        <p class="course-desc"><?= $curso['descricao'] ?></p>
                        <a href="<?= $curso['link'] ?>" class="course-link">Ver curso</a>
                    </div>
                </div>
            <?php endforeach; ?>
            <a href="#" class="open-modal" data-target="modalNovoCurso">
                <img src="../images/adicionar_curso.png" alt="" width="320" height="330" />
                <a>
                    <?php renderModal($modalId, $modalContent); ?>
        </section>
    </section>

</main>