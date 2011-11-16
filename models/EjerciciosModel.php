<?php
class EjerciciosModel extends ModelBase
{
    public function listadoTotal()
    {
        //realizamos la consulta de todos los items
        $consulta = $this->db->prepare('SELECT * FROM ejercicio');
        $consulta->execute();
        //devolvemos la coleccion para que la vista la presente.
        return $consulta;
    }

    public function getvideo($id_ejercicio)
    {
        $consulta = $this->db->prepare('SELECT video from ejercicio where id_ejercicio=:id');
        $consulta->bindParam(":id", $id_ejercicio, PDO::PARAM_INT);
        $consulta->execute();

        return $consulta;

    }

    public function save($name, $link,$zona)
    {

        $consulta = $this->db->prepare('INSERT INTO ejercicio (nombre,zona,video) VALUES (:name,:zona,:link);');

        $consulta->bindParam(":name", $name);
        $consulta->bindParam(":link", $link);
        $consulta->bindParam(":zona", $zona);

        return $consulta->execute();
    }

    public function lastAdded($name)
    {

        $consulta = $this->db->prepare('SELECT * from ejercicio where nombre=:name');
        $consulta->bindParam(":name", $name, PDO::PARAM_STR);
        $consulta->execute();

        return $consulta;

    }

    public function selectEjercicioZona($zona)
    {

        $consulta = $this->db->prepare("SELECT * from ejercicio where zona='" . $zona . "' ");
        $consulta->execute();
        //devolvemos la coleccion para que la vista la presente.
        return $consulta;


    }
    
    public function saveCicloEjercicio($id_ejercicio,$id_user,$id_ciclo,$maximal,$carga,$repeticiones,$series,$pausa){

        $consulta = $this->db->prepare("INSERT INTO ciclo_ejercicio (id_ejercicio,id_user,id_ciclo,maximal,carga,repeticiones,series,pausa) VALUES (:id_ejercicio,:id_user,:id_ciclo,:maximal,:carga,:repeticiones,:series,:pausa)");

        $consulta->bindParam(':id_ejercicio',$id_ejercicio);
        $consulta->bindParam(':id_user',$id_user);
        $consulta->bindParam(':id_ciclo',$id_ciclo);
        $consulta->bindParam(':maximal',$maximal);
        $consulta->bindParam(':carga',$carga);
        $consulta->bindParam(':repeticiones',$repeticiones);
        $consulta->bindParam(':series',$series);
        $consulta->bindParam(':pausa',$pausa);

        $valor=$consulta->execute();
		//devolvemos la coleccion para que la vista la presente.
		print_r($valor);


    }

}

?>