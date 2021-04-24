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

        $sql = 'SELECT * FROM notes';
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

        $sql = "INSERT INTO notes (titulo, texto, imagem) VALUES (?,?,?)";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $this->titulo);
        $stmt->bindValue(2, $this->texto);
        $stmt->bindValue(3, $this->imagem);

        if($stmt->execute())
        {
            return "Cadastrado com sucesso!";
        }
        else
        {
            return "Erro ao cadastrar.";
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
            return "Atualizado com sucesso!";
        }
        else
        {
            return "Erro ao atualizar.";
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
            return "Atualizado com sucesso!";
        }
        else
        {
            return "Erro ao atualizar.";
        }


    }

    public function deleteImage($id){

        $sql = "UPDATE notes SET imagem = ?  WHERE id = ?";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, "");
        $stmt->bindValue(2, $id);

        if($stmt->execute())
        {
            return "Imagem deletada com sucesso!";
        }
        else
        {
            return "Erro ao deletar imagem.";
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
            return "Excluido com sucesso!";
        }
        else
        {
            return "Erro ao excluir.";
        }
    }

    public function search($search){

        $sql = "SELECT * FROM notes WHERE titulo LIKE  ? COLLATE utf8_general_ci";
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