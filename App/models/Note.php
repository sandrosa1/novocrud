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

}