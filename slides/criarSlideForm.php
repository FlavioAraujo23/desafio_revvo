<form action="/slides/salvarSlide.php" method="POST" enctype="multipart/form-data" class="form-container">
    <h2 class="form-title">Criar Slide</h2>
    <label for="titulo" class="label-text">Titulo</label>
    <input type="text" name="titulo" id="titulo" placeholder="Digite seu titulo do slide...">

    <label for="descricao" class="label-text">Descrição</label>
    <input type="text" name="descricao" id="descricao" placeholder="Digite sua descrição do slide...">

    <label for="linkbtn" class="label-text">Url do botão</label>
    <input type="text" name="linkbtn" id="linkbtn" placeholder="Digite seu Link do botão...">

    <label for="imagem" class="label-text">Clique para enviar sua imagem</label>
    <input type="file" name="imagem" id="imagem">
    <input type="submit" value="Salvar" class="btn-primary">
</form>