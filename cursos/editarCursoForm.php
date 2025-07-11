<form method="post" action="/cursos/atualizarCurso.php" enctype="multipart/form-data" class="form-container">
    <h2 class="form-title">Editar Curso: <?= $curso['titulo'] ?></h2>
    <a href="/cursos/excluirCurso.php?id=<?= $curso['id'] ?>"
        onclick="confirm('Tem certeza que deseja excluir o curso <?= $curso['titulo'] ?>? \nEssa ação é irreversivel!')"
        class="delete">
        <i class="fa-solid fa-trash"></i> Excluir
    </a>
    <input type="hidden" name="id" value="<?= $curso['id'] ?>">
    <label class="label-text">Título:</label>
    <input type="text" name="titulo" value="<?= $curso['titulo'] ?>">

    <label class="label-text">Descrição:</label>
    <textarea name="descricao"><?= $curso['descricao'] ?></textarea>

    <label for="linkbtn" class="label-text">Url do botão</label>
    <input type="text" name="linkbtn" id="linkbtn" placeholder="Digite seu Link do botão..."
        value="<?= $curso['link'] ?>">

    <label class="label-text">Imagem:</label>
    <img src="/cursos/<?= $curso['imagem'] ?>" alt="" width="250" height="250">
    <input type="file" name="imagem" id="imagem">

    <input type="submit" value="Salvar" class="btn-primary">
</form>