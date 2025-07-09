<?php
require "./MockData/mockSlides.php"
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
                <?php foreach ($slides as $slide): ?>
                    <div class="slide">
                        <img src="<?= $slide['imagem'] ?>" alt="<?= $slide['titulo'] ?>" />
                        <div class="slide-details">
                            <h2><?= $slide['titulo'] ?></h2>
                            <p><?= $slide['descricao'] ?></p>
                            <a href="<?= $slide['link'] ?>">Ver cursos</a>
                        </div>
                    </div>
                <?php endforeach; ?>
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
    </section>
    <script src="slide/slide.js"></script>
</body>

</html>