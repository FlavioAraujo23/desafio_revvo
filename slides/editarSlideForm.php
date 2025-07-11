<h2>Editar Slide: <?= $slide['titulo'] ?></h2>
<form method="post" action="/slides/atualizarSlide.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $slide['id'] ?>">
    <label>Título:</label>
    <input type="text" name="titulo" value="<?= $slide['titulo'] ?>">

    <label>Descrição:</label>
    <textarea name="descricao"><?= $slide['descricao'] ?></textarea>

    <label>Imagem:</label>
    <img src="/slides/<?= $slide['imagem'] ?>" alt="" width="250" height="250">
    <input type="file" name="imagem" id="imagem">

    <label>Descrição:</label>
    <textarea name="descricao"><?= $slide['descricao'] ?></textarea>

    <button type="submit">Salvar</button>
</form>