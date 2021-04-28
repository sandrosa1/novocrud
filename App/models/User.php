<?php
use App\Core\Model;

/**
 * Class responsável pelo crud do comentário
 */
class User extends Model
{
    /**
     * Nome do usuário
     *
     * @var string
     */
    public $nome;

    /**
     * Email do usuário
     *
     * @var string
     */
    public $email;

    /**
     * Senha do usuário
     *
     * @var string
     */
    public $senha;

    /**
     * Imagem do usuário
     *
     * @var string
     */
    public $imagemUsuario;


    /**
     * Método que salva os dados de um usuáario
     *
     * @return string
     */
    public function save(){

        $sql = "INSERT INTO users (nome, email, senha, imagemUsuario) VALUES (?,?,?,?)";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $this->nome);
        $stmt->bindValue(2, $this->email);
        $stmt->bindValue(3, $this->senha);
        $stmt->bindValue(4, $this->imagemUsuario);
    
        if($stmt->execute())
        {
            return "  M.toast({html: 'Usuário cadastrado com sucesso', classes: 'rounded, blue'});";
        }
        else
        {
            return "M.toast({html: 'Erro ao cadastrar usuário!', classes: 'rounded, red'});";
        }
    }


}


