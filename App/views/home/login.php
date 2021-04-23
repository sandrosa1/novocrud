<br>
<?php 
if(!empty($data['mensagem'])){
    
    foreach($data['mensagem'] as $m ){
        echo $m."<br>";
    }
} 
?>
<h1> Fazer Login </h1>

<form action="/home/login" method="post">
Email: <input type="text" name="email" > <br>
Senha: <input type="password" name="senha" > <br>
<button name="entrar"> Entrar </button>
</form>