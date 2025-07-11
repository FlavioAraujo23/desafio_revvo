<form method="post" action="/slides/atualizarSlide.php" enctype="multipart/form-data" class="form-container">
    <h2 class="form-title">Editar Slide: <?= $slide['titulo'] ?></h2>
    <a href="/slides/excluirSlide.php?id=<?= $slide['id'] ?>"
        onclick="confirm('Tem certeza que deseja excluir o slide <?= $curso['titulo'] ?>? \nEssa ação é irreversivel!')"
        class="delete">
        <i class="fa-solid fa-trash"></i> Excluir
    </a>
    <input type="hidden" name="id" value="<?= $slide['id'] ?>">
    <label class="label-text">Título:</label>
    <input type="text" name="titulo" value="<?= $slide['titulo'] ?>">

    <label class="label-text">Descrição:</label>
    <textarea name="descricao"><?= $slide['descricao'] ?></textarea>

    <label for="linkbtn" class="label-text">Url do botão</label>
    <input type="text" name="linkbtn" id="linkbtn" placeholder="Digite seu Link do botão..."
        value="<?= $slide['link'] ?>">

    <label class="label-text">Imagem:</label>
    <img src="/slides/<?= $slide['imagem'] ?>" alt="" width="250" height="250">
    <input type="file" name="imagem" id="imagem">

    <input type="submit" value="Salvar" class="btn-primary">
</form>