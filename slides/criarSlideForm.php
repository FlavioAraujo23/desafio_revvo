<form action="/slides/salvarSlide.php" method="POST" enctype="multipart/form-data">
    <label for="titulo">Titulo</label>
    <input type="text" name="titulo" id="titulo" placeholder="Digite seu titulo do slide...">

    <label for="descricao">Descrição</label>
    <input type="text" name="descricao" id="descricao" placeholder="Digite sua descrição do slide...">

    <label for="linkbtn">Url do botão</label>
    <input type="text" name="linkbtn" id="linkbtn" placeholder="Digite seu Link do botão...">

    <label for="imagem">Clique para enviar sua imagem</label>
    <input type="file" name="imagem" id="imagem">
    <input type="submit" value="Salvar">
</form>