<h1>Criar bloco de anotação</h1>

<?php if(!empty($data['mensagem'])){
    
    foreach($data['mensagem'] as $m ){
        echo $m."<br>";
    }
} ?>

<form action="/notes/criar" method="post">
    Titulo: <input type="text" name="titulo" ><br><br>
    Texto: <textarea  name="texto" ></textarea><br><br>
    <button name='cadastrar'>Cadastrar</button>
</form>