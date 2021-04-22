<h1>Editar bloco de anotação</h1>

<?php if(!empty($data['mensagem'])){
    
    foreach($data['mensagem'] as $m ){
        echo $m."<br>";
    }
} ?>



<form action="/notes/editar/<?php echo $data['registros']['id']; ?>" method="post">
    Titulo: <input type="text" value="<?php echo $data['registros']['titulo']; ?>" name="titulo" ><br><br>
    Texto: <textarea  name="texto" ><?php echo $data['registros']['texto']; ?></textarea><br><br>
    <button name='atualizar'> Atualizar </button>
</form>

