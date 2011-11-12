<?php
class EjerciciosController extends ControllerBase
{
    public function listar()
    {
        require 'models/EjerciciosModel.php';
        //Incluye el modelo que corresponde
        //Creamos una instancia de nuestro "modelo"
        $items = new EjerciciosModel();

        //Le pedimos al modelo todos los items
        $listado = $items->listadoTotal();


        //Pasamos a la vista toda la informaci�n que se desea representar

        //$listado;
        //$data['listado'] = $listado;

        return $listado;
        //Finalmente presentamos nuestra plantilla
        //$this->view->show("listar.php", $data);
    }

    public function video()
    {

        $id = $_GET['lista_ejercicios'];


        require 'models/EjerciciosModel.php';

        $ejercicio = new EjerciciosModel();

        $video = $ejercicio->getvideo($id);
        $result = $video->fetch();

        echo $id;   
        //echo $result["video"];


    }

    public function agregar()
    {
        echo 'Aqui incluiremos nuestro formulario para insertar items';
    }

    public function eliminar()
    {
        echo 'Eliminacion de items';
    }
}

?>