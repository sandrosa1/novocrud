<?php
use App\Core\Model;
/**
 * Class responsável pelo crud
 */
class Note extends Model{

        public $titulo;
        public $texto;
        public $imagem;

    /**
     * Método que traz os dados do banco se  houver
     *
     * @return array
     */
    public function getAll(){

        //$sql = 'SELECT notes.id, notes.titulo, notes.texto, notes.imagem, users.nome FROM notes INNER JOIN users ON notes.id_user = users.id';
        $sql = 'SELECT notes.id, notes.titulo, notes.texto, notes.imagem, users.nome, users.imagemUsuario FROM notes INNER JOIN users ON notes.id_user = users.id ORDER BY notes.id DESC';
        $stmt = Model::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }else{
            return []; 
        }
    }
    /**
     * Método que busca o id selecionado no Banco
     *
     * @param string $id
     * @return array 
     */
    public function findId($id){

        $sql = 'SELECT * FROM notes WHERE id = ?';
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $resultado;
        }else{
            return []; 
        }
    }


    public function save(){

        $sql = "INSERT INTO notes (titulo, texto, imagem, id_user) VALUES (?,?,?,?)";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $this->titulo);
        $stmt->bindValue(2, $this->texto);
        $stmt->bindValue(3, $this->imagem);
        $stmt->bindValue(4, $this->id_user);

        if($stmt->execute())
        {
            return "  M.toast({html: ' Cadastrado com sucesso', classes: 'rounded, blue'});";
        }
        else
        {
            return "M.toast({html: 'Erro ao cadastrar imagem!', classes: 'rounded, red'});";
        }
    }
    
    public function update($id){

        $sql = "UPDATE notes SET titulo = ? , texto = ? WHERE id = ?";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $this->titulo);
        $stmt->bindValue(2, $this->texto);
        $stmt->bindValue(3, $id);

        if($stmt->execute())
        {
            return " M.toast({html: 'Atualizado com sucesso', classes: 'rounded, blue'});";
        }
        else
        {
            return "M.toast({html: 'Erro ao atualizar!', classes: 'rounded, red'});";
        }


    }

    public function updateImagem($id){

        $sql = "UPDATE notes SET titulo = ? , texto = ? , imagem = ? WHERE id = ?";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $this->titulo);
        $stmt->bindValue(2, $this->texto);
        $stmt->bindValue(3, $this->imagem);
        $stmt->bindValue(4, $id);

        if($stmt->execute())
        {
            return "M.toast({html: 'Imagem atualizada com sucesso', classes: 'rounded, blue'});";
        }
        else
        {
            return "M.toast({html: 'Erro ao atualizar imagem!', classes: 'rounded, red'});";
        }


    }

    public function deleteImage($id){

        $sql = "UPDATE notes SET imagem = ?  WHERE id = ?";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, "");
        $stmt->bindValue(2, $id);

        if($stmt->execute())
        {
            return "  M.toast({html: ' Imagem deletada com sucesso', classes: 'rounded, blue'});";
        }
        else
        {
            return "M.toast({html: 'Erro ao deletar imagem!', classes: 'rounded, red'});";
        }

    }

    public function delete($id){


        $resultado = $this->findId($id);
      
        if(!empty($resultado['imagem'])) {
            unlink("uploads/".$resultado['imagem']);

        }
      

        $sql = "DELETE FROM notes WHERE id = ?";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        if($stmt->execute())
        {
            return "  M.toast({html: 'Excluido com sucesso', classes: 'rounded, blue'});";
        }
        else
        {
            return "M.toast({html: 'Erro ao excluir!', classes: 'rounded, red'});";
        }
    }

    public function search($search){

        $sql = "SELECT notes.id, notes.titulo, notes.texto, notes.imagem, users.nome, users.imagemUsuario FROM notes INNER JOIN users ON notes.id_user = users.id WHERE titulo LIKE  ? COLLATE utf8_general_ci";
        //$sql = "SELECT * FROM notes WHERE titulo LIKE  ? COLLATE utf8_general_ci";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, "%{$search}%");
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetchALL(\PDO::FETCH_ASSOC);
            return $resultado;
        }else{
            return []; 
        }
    }


}