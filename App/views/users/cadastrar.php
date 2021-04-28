<div class="container">

    <h3 class="light">Cadastrar Usuários</h3>

    <!-- Barra de pesquisa  -->
    <?php if(!empty($data['mensagem']))
    {
        echo "<script>";

        foreach($data['mensagem'] as $m )
        {
            echo $m ;
        }

        echo "</script>";

    } ?>
    <!-- Cadastro de usuários -->
    <form action="/users/cadastrar" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="input-field col s6">
            <input required placeholder="Seu nome" id="first_name" type="text" class="validate" name="nome">
            <label for="first_name">Nome</label>
            </div>
        <div class="input-field col s12">
            <input required id="email" type="email" name="email" class="validate">
            <label for="email">Email</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input required id="password" type="password" name="senha" class="validate">
            <label for="password">Password</label>
        </div>
    </div>
    <div class="file-field input-field">
        <div class="btn">
            <span>File</span>
            <input required type="file" name="imagem" Value="" >
        </div>
        <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="imagem do colaborador"/>
        </div>
        </div>
    <button class="waves-effect waves-light btn green"  name='cadastrar'>Cadastrar</button>
    </form>
</div>