<br>

<div class="row container">
<h3 class="light"> Fazer Login </h3>
<?php 
if(!empty($data['mensagem'])){
    
    foreach($data['mensagem'] as $m ){
        echo $m."<br>";
    }
} 
?>

<form action="/home/login" method="post">
<div class="row">
    <div class="input-field col s12">
        <input id="email" type="email" name="email" class="validate">
        <label for="email">Email</label>
    </div>
</div>
<div class="row">
    <div class="input-field col s12">
        <input id="password" type="password" name="senha" class="validate">
        <label for="password">Password</label>
    </div>
</div>
<button class="waves-effect waves-light btn green" name="entrar"> Entrar </button>
</form>
</div>