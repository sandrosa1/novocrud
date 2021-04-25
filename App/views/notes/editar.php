
<div class="container">

<h3 class="light">Editar bloco de anotação</h3>

<?php if(!empty($data['mensagem'])){
    echo "<script>";
    foreach($data['mensagem'] as $m ){
        echo $m ;
    }
    echo "</script>";

} ?>

<form action="/notes/editar/<?php echo $data['registros']['id']; ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="row">
          <div class="input-field col s6">
            <input required id="input_text" type="text" data-length="10" name="titulo" value="<?php echo $data['registros']['titulo']; ?>">
            <label for="input_text">Titulo</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea required id="textarea2" class="materialize-textarea" data-length="120" name="texto"><?php echo $data['registros']['texto']; ?></textarea>
            <label for="textarea2">Textarea</label>
          </div>
        </div>
    </div>
<?php 
  if(!empty($data['registros']['imagem'])):
?>
    <img style="float:left; margin: 0 15px 50px 0;" src="<?php URL_BASE; ?>/uploads/<?php echo $data['registros']['imagem']; ?> " width="50" alt="Imagem" >
    <button class="waves-effect waves-light btn red" name='deletarImagem'> Deletar imagem </button>
    <button class="waves-effect waves-light btn green" name='atualizar'> Atualizar </button>
<?php 
else:
?>
  <div class="file-field input-field">
      <div class="btn">
        <span>File</span>
        <input required type="file" name="foo" Value="" >
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Upload de imagens."/><br>
      
      </div>
    </div>
    <button class="waves-effect waves-light btn green" name='atualizarImagem'> Atualizar </button>
<?php
  endif;
?>
  
</form>

</div>