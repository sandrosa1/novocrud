<?php
use App\Core\Model;

class User extends Model
{
    public $nome;
    public $email;
    public $senha;
    public $imagemUsuario;


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


