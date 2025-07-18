<?php
require_once "./db/database.php";
require_once 'includes/modal.php';


$stmt = $conn->prepare("SELECT * FROM slides");
$stmt->execute();
$result = $stmt->get_result();

$slides = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

$modalNovoSlideId = 'modalNovoSlide';
ob_start();
include 'criarSlideForm.php';
$modalNovoSlideContent = ob_get_clean();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="assets/css/slide.css">
</head>

<body>
    <section class="main-container">
        <section class="slider-container">
            <section class="slider-wrapper" id="sliderWrapper">
                <?php if (empty($slides)): ?>
                    <div class="slide">
                        <img src="/images/imagem-padrao.jpg" alt="Desafio Revvo" />
                        <a href="#" class="open-modal add" data-target="modalNovoSlide">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                        <?php renderModal($modalNovoSlideId, $modalNovoSlideContent); ?>
                        <div class="slide-details">
                            <h2>Seja Bem vindo!</h2>
                            <p>Essa é uma plataforma desenvolvida para o Desafio Revvo!</p>
                            <a href="#" target="_blank">Ver cursos</a>
                        </div>
                    </div>

                <?php else: ?>
                    <?php foreach ($slides as $slide): ?>
                        <div class="slide">
                            <img src="/slides/<?= $slide['imagem'] ?>" alt="<?= $slide['titulo'] ?>" />
                            <a href="#" class="open-modal edit" data-target="modalEditarSlide<?= $slide['id'] ?>">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            <a href="#" class="open-modal add" data-target="modalNovoSlide">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                            <?php renderModal($modalNovoSlideId, $modalNovoSlideContent); ?>
                            <div class="slide-details">
                                <h2><?= $slide['titulo'] ?></h2>
                                <p><?= $slide['descricao'] ?></p>
                                <a href="<?= $slide['link'] ?>" target="_blank">Ver cursos</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </section>

            <button class="prev" onclick="trocaSlide('prev')">
                <i class="fa-solid fa-chevron-left"></i>
            </button>

            <button class="next" onclick="trocaSlide('next')">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </section>
        <section class="bullets" id="bullets">
            <?php foreach ($slides as $index => $slide): ?>
                <span class="bullet" onclick="vaParaOSlide( <?= $index ?>)"></span>
            <?php endforeach; ?>
        </section>

        <?php
        foreach ($slides as $slide) {
            ob_start();
            include 'editarSlideForm.php';
            $modalContent = ob_get_clean();
            renderModal("modalEditarSlide" . $slide['id'], $modalContent);
        }
        ?>
    </section>
    <script src="slides/slide.js"></script>
</body>

</html>