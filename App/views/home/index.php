<nav>
    <div class="nav-wrapper">
      <form method="post" action="home/buscar">
        <div class="input-field">
          <input id="search" type="search" name="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>
<br>
<?php 
if(!empty($data['mensagem'])){
    
    foreach($data['mensagem'] as $m ){
        echo $m."<br>";
    }
} 
?>

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

<h1> <a href="/notes/ver/<?php echo $note['id']; ?>"> <?php echo $note['titulo']; ?> </a> </h1>
<p><?php echo $note['texto']; ?></p> <br>

<?php if(isset($_SESSION['logado'])): ?>
<a class="waves-effect waves-light btn blue" href="/notes/editar/<?php echo $note['id']; ?>">Atualizar</a>  

<a class="waves-effect waves-light btn red" href="/notes/excluir/<?php echo $note['id']; ?>">Exlcuir</a>  <br>
<?php endif; ?>
<?php endforeach; ?>


<?php
//Navegação
$pagination->navigator($var);
?>

</div>