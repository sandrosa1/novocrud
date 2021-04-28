<nav>
    <div class="nav-wrapper blue">
      <form method="post" action="/home/buscar">
        <div class="input-field">
          <input id="search" type="search" name="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>
<br>



<?php if(!empty($data['mensagem'])){
    echo "<script>";
    foreach($data['mensagem'] as $m ){
        echo $m ;
    }
    echo "</script>";

} ?>

<div class="row container">

<?php
if(isset($_GET['page'])){

    $var = $_GET['page'];
}else{

    $var = 1;
}
$pagination = new App\Pagination( $data['registros'] , $var , 3);
?>
<?php
if(empty($pagination->result($var))){
    echo "Nenhum registro encontrado";
}
?>


<?php

foreach($pagination->result($var) as $note): ?>

<div class="row">
<div class="col s8">
<img style="float:left; margin: 0 15px  15px 0" src="<?php URL_BASE; ?>/uploads/<?php echo $note['imagem']; ?> " width="120" alt="Imagem" >
<h3 class="light"> <a href="/notes/ver/<?php echo $note['id']; ?>"> <?php echo $note['titulo']; ?> </a> </h3>
<p><?php echo $note['texto']; ?></p>
</div>
<div class="col s4">
<img style="float:left; margin: 0 15px  15px 0;bottom: 0;" src="<?php URL_BASE; ?>/imagemUsuarios/<?php echo $note['imagemUsuario']; ?> " width="50" alt="Imagem" >
<p>Coméntario de <?php echo $note['nome']; ?></p> 

<?php if((isset($_SESSION['logado']) AND ($_SESSION['userNome'] == $note['nome'] )) or $_SESSION['level'] == 2 ): ?>

<!-- Modal Structure -->
<div id="confirmacaoDoModol-<?php echo $note['id']; ?>" class="modal">
    <div class="modal-content">
      <h4>Confirmação</h4>
      <p>Está ação é irreversivel</p>
      <p>Está certo disto?</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat blue">Cancelar</a>
      <a class="waves-effect waves-light btn red" href="/notes/excluir/<?php echo $note['id']; ?>">Excluir</a>  
    </div>
  </div>

<a class="waves-effect waves-light btn blue" href="/notes/editar/<?php echo $note['id']; ?>">Atualizar</a>  

  <!-- Modal Trigger -->
<a class="waves-effect waves-light btn modal-trigger red" href="#confirmacaoDoModol-<?php echo $note['id']; ?>">Excluir</a>

<?php endif; ?>
</div>
</div>
<?php endforeach; ?>


<?php
//Navegação
$pagination->navigator($var);
?>

</div>