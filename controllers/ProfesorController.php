<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Cesarin
 * Date: 24-10-11
 * Time: 07:13 PM
 * To change this template use File | Settings | File Templates.
 */

class ProfesorController extends ControllerBase
{

//Incluye el modelo que corresponde

    function home()
    {
        require 'models/AlumnosModel.php';

        //Creamos una instancia de nuestro "modelo"
        $users = new AlumnosModel();

        //Le pedimos al modelo todos los items
        $listado = $users->lastRegister();

        //Pasamos a la vista toda la informaci�n que se desea representar
        $data['last'] = $listado;

        //Finalmente presentamos nuestra plantilla
        $this->view->show("lastregister.php", $data);
    }

    function welcome()
    {
        require 'models/AlumnosModel.php';

        //Creamos una instancia de nuestro "modelo"
        $users = new AlumnosModel();

        //Le pedimos al modelo todos los items
        $listado = $users->lastRegister();

        //Pasamos a la vista toda la informaci�n que se desea representar
        return $listado;
    }

    function ejercicios()
    {

        require 'EjerciciosController.php';

        $listarEjercicios = new EjerciciosController();

        $lista = $listarEjercicios->listar();

        $data['listado'] = $lista;
        $this->view->show("ejercicios.php", $data);
    }

    function estadisticas()
    {

        require 'controllers/GraficController.php';

        $grafic = new GraficController();

        $grafic->ListarGraficConsumo();
        $grafic->ListarGraficEnfermedades();
        $grafic->ListarGraficLesiones();
        $grafic->ListarGraficActFisica();
        $this->view->show("estadistica.php");
    }

    function buscar()
    {

        $this->view->show("buscaralumno.php");
    }

    function buscarAlumno()
    {
        require "models/AlumnosModel.php";


        if (isset($_POST['q']) /*and !eregi('^ *$',$_GET['q'])*/) {
            $buscar = $_POST['q'];
            $string = htmlentities($buscar);
        }
        $param_bus = explode(" ", $string);

        $user = new AlumnosModel();
        $result = $user->buscarUserbyName(array_pop($param_bus), array_pop($param_bus), array_pop($param_bus), array_pop($param_bus));

        $data['result'] = $result;

        $this->view->show("resultadobusqueda.php", $data);

    }
    function perfil(){


        require "models/ProfesorModel.php";
        $id= $_GET['id'];
        $profesor= new ProfesorModel();
        
        $data['datos'] = $profesor->getDatos($id);
        $this->view->show("cuentaprofesor.php",$data);

    }

 public function perfil_alumno(){
             require 'models/AlumnosModel.php';
            $alumno = new AlumnosModel();
            $id_alumno= $_GET['id'];

            $data['lesion']= $alumno->lesiones($id_alumno);
            echo $data['lesion'];
            $data = $alumno->datos($id_alumno);
            $this->view->show("alumnoProfesor.php",$data);

    }

}

?>