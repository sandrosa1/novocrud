<?php
use App\Core\Model;
/**
 * Class responsável pelo crud
 */
class Note extends Model{

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

}