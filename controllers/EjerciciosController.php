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

        $id = $_GET['id'];


        require 'models/EjerciciosModel.php';

        $ejercicio = new EjerciciosModel();

        $video = $ejercicio->getvideo($id);
        $result = $video->fetch();

        echo $result["video"];


    }

    public function agregar()
    {
        require 'models/EjerciciosModel.php';

        $save = new EjerciciosModel();

        $name = $_POST['name'];
        $link = $_POST['link'];
        $zona = $_POST['zona'];

        if ($save->save($name, $link,$zona)) {
            $result = $save->lastAdded($name)->fetch();

            echo $result["id_ejercicio"];

        }

        else echo "-1";

    }

    public function selectEjercicioZona($zona)
    {

        $consulta = $this->db->prepare("SELECT * from ejercicio where zona='" . $zona . "' ");
        $consulta->execute();
        //devolvemos la coleccion para que la vista la presente.
        return $consulta;


    }

    public function ListarZona()
    {

        require 'models/EjerciciosModel.php';
        require 'models/AlumnosModel.php';


        $user = new AlumnosModel();


        $id_user = $_POST['id_user'];

        $datos_user = $user->datos($id_user);

        $id_zona = $_POST['id_zona'];
        //Creamos una instancia de nuestro "modelo"
        $items = new EjerciciosModel();

        $listado = $items->selectEjercicioZona($id_zona);

        //Pasamos a la vista toda la informaci�n que se desea representar
        $data['listado'] = $listado;
        $data['datos_user'] = $datos_user;

        //Finalmente presentamos nuestra plantilla
        $this->view->show("listar_ejercicios.php", $data);
    }

    public function GuardarCicloEjercicio()
    {

        require 'models/EjerciciosModel.php';
        $items = new EjerciciosModel();
        $id_ejercicio = $_POST['id_ejercicio'];
        $ciclo = $_POST['ciclo'];
        $maximal = $_POST['maximal'];
        $carga = $_POST['carga'];
        $pausa = $_POST['pausa'];
        $repeticiones = $_POST['repeticiones'];
        $series = $_POST['series'];
        $id_user = $_POST['id_user'];
        $items->saveCicloEjercicio($id_ejercicio, $id_user, $ciclo, $maximal, $carga, $repeticiones, $series, $pausa);


    }

public function addRutina()
{

    $id_user = $_POST['id_user'];

    $data['id_user'] = $id_user;
    $this->view->show("cicloMuscular.php", $data);

}

}

?>