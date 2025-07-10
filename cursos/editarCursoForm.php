<h2>Editar Curso: <?= $curso['titulo'] ?></h2>
<form method="post" action="/cursos/atualizarCurso.php" enctype="multipart/form-data">
    <a href="/cursos/excluirCurso.php?id=<?= $curso['id'] ?>"
        onclick="confirm('Tem certeza que deseja excluir o curso <?= $curso['titulo'] ?>? \nEssa ação é irreversivel!')">
        <i class="fa-solid fa-trash"></i>
    </a>
    <input type="hidden" name="id" value="<?= $curso['id'] ?>">
    <label>Título:</label>
    <input type="text" name="titulo" value="<?= $curso['titulo'] ?>">

    <label>Descrição:</label>
    <textarea name="descricao"><?= $curso['descricao'] ?></textarea>

    <label>Imagem:</label>
    <img src="/cursos/<?= $curso['imagem'] ?>" alt="" width="250" height="250">
    <input type="file" name="imagem" id="imagem">

    <label>Descrição:</label>
    <textarea name="descricao"><?= $curso['descricao'] ?></textarea>

    <button type="submit">Salvar</button>
</form>