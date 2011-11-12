<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alejandra
 * Date: 10-11-11
 * Time: 06:02 PM
 * To change this template use File | Settings | File Templates.
 */
 
class PerfilController extends ControllerBase {


   public  function show(){

        require 'ProfesorController.php';

        if($_SESSION['perfil']== 'profesor'){

            $estructura['titulo'] = 'Perfil Profesor';
            $estructura['controlador'] = 'Profesor';
            $menu_visual = array ('Home', 'Ejercicios', 'Perfil', 'Buscar Alumno', 'Estadísticas');
            $function['Home']='home';
            $function['Ejercicios']='ejercicios';
            $function['Perfil']='perfil';
            $function['Buscar Alumno']='buscar';
            $function['Estadísticas']='estadisticas';

            $profesor = new ProfesorController();

            $welcome = $profesor->welcome();



        }else if($_SESSION['perfil']== 'alumno'){

            $estructura['titulo'] = 'Perfil Alumno';
            $estructura['controlador'] = 'Alumno';
            $menu_visual = array ('Home', 'Perfil', 'Rutina', 'Gráficos','Nutrición');
            $function['Home']='home';
            $function['Perfil']='perfil';
            $function['Rutina']='rutina';
            $function['Gráficos']='gráficos';
            $function['Nutrición']='nutrición';


        }

       $data['estructura']=$estructura;
       $data['menu_visual']=$menu_visual;
       $data['function']= $function;
       $data ['welcome'] = $welcome;


       $this->view->show("perfil.php",$data);


}

}
