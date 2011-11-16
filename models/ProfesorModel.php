<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Cesarin
 * Date: 15-11-11
 * Time: 06:46 PM
 * To change this template use File | Settings | File Templates.
 */
 
class ProfesorModel extends ModelBase{


    public function getDatos($id){

        $consulta = $this->db->prepare("SELECT * FROM profesor WHERE id_profesor=:id");
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);

        if($row != 0) return $row;
        else return false;

    }



}
?>