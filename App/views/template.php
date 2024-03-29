<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fatec Crud PHP</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
       
<!-- Barra navegadora -->
<nav class= "green">
    <div class="nav-wrapper container">

      <a href="#" class="brand-logo">Heróis</a>

    <ul id="nav-mobile" class="right hide-on-med-and-down">

        <li><a href="/"> Home </a></li>
          <!-- Controle de usuario -->
        <?php if(isset($_SESSION['logado'])): ?>

        <li><a href="/notes/criar"> Criar bloco </a></li>

        <?php endif; ?>
        <?php if(isset($_SESSION['logado']) AND $_SESSION['level'] == 2): ?>

        <li><a href="/users/cadastrar"> Cadastrar usuario </a></li>

        <?php endif; ?>
        <?php if(!isset($_SESSION['logado'])): ?>
        
        <li><a href="/home/login"> Login </a></li> 

        <?php else: ?>
        Olá <?php echo $_SESSION['userNome']; ?>

        <li><a href="/home/logout"> Logout </a></li> 

        <?php endif; ?>
      </ul>
    </div>
</nav>
         
        

<?php require_once '../App/views/'.$view.'.php'; ?>
<!-- Inicia toos script do materialize -->
<script> M.AutoInit(); </script>

</body>
</html>