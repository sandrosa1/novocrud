<div class="container">
<h3 class="light">Cadastrar Usuarios</h3>

<?php if(!empty($data['mensagem'])){
    
    foreach($data['mensagem'] as $m ){
        echo $m."<br>";
    }
} ?>

<form action="/users/cadastrar" method="post">
    Nome: <input type="text" name="nome" ><br><br>
    Email: <input type="text" name="email" ><br><br>
    Senha: <input type="password" name="senha" ><br><br>
  
    <button class="waves-effect waves-light btn green"  name='cadastrar'>Cadastrar</button>
</form>
</div>