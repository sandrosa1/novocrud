<div class="container">

<h3 class="light">Criar bloco de anotação</h3>

<?php if(!empty($data['mensagem'])){
    echo "<script>";
    foreach($data['mensagem'] as $m ){
        echo $m ;
    }
    echo "</script>";

} ?>

<form action="/notes/criar" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="row">
          <div class="input-field col s6">
            <input required id="input_text" type="text" data-length="10" name="titulo">
            <label for="input_text">Titulo</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea required id="textarea2" class="materialize-textarea" data-length="120" name="texto"></textarea>
            <label for="textarea2">Textarea</label>
          </div>
        </div>
    </div>
    <!-- Imagem: <br> <input type="file" name="foo" value=""><br><br> -->
    <div class="file-field input-field">
      <div class="btn">
        <span>File</span>
        <input required type="file" name="foo" Value="" >
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Upload de imagens."/>
      </div>
    </div>
 
    <button class="waves-effect waves-light btn green" name='cadastrar'>Cadastrar</button>
</form>

</div>