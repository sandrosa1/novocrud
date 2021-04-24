<div class="container">

<h1>Criar bloco de anotação</h1>

<?php if(!empty($data['mensagem'])){
    
    foreach($data['mensagem'] as $m ){
        echo $m."<br>";
    }
} ?>

<form action="/notes/criar" method="post">
    <div class="row">
        <div class="row">
          <div class="input-field col s6">
            <input id="input_text" type="text" data-length="10" name="titulo">
            <label for="input_text">Titulo</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea id="textarea2" class="materialize-textarea" data-length="120" name="texto"></textarea>
            <label for="textarea2">Textarea</label>
          </div>
        </div>

    </div>
 
    <button class="waves-effect waves-light btn green" name='cadastrar'>Cadastrar</button>
</form>

</div>