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
        $consulta->bindParam(":id",$id_ejercicio,PDO::PARAM_INT);
        $consulta->execute();

    return $consulta;

    }
}
?>