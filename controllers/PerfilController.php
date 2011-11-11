<?php

/**
 * Created by JetBrains PhpStorm.
 * User: Cesarin
 * Date: 10-11-11
 * Time: 06:13 PM
 * To change this template use File | Settings | File Templates.
 *
 * Identificar que tipo de usuario es: profesor o alumno y entregar las información correspondiente
 * para el menu y el entorno del perfilç
 *
 * Menu: string de cada link
 *       info para el controlador (Alumno o Profesor)
 *       funciones asociadas a cada link
 *
 * Other stuff:
 *
 *          string para el titulo
 * Created by JetBrains PhpStorm.
 * User: Alejandra
 * Date: 10-11-11
 * Time: 06:02 PM
 * To change this template use File | Settings | File Templates.
 */
 
class PerfilController extends ControllerBase {


   public  function show(){

        if($_SESSION['perfil']== 'profesor'){

            $estructura['titulo'] = 'Perfil Profesor';
            $estructura['controlador'] = 'Profesor';
            $menu_visual = array ('Home', 'Ejercicios', 'Perfil', 'Buscar Alumno', 'Estadísticas');
            $function['Home']='home';
            $function['Ejercicios']='ejercicios';
            $function['Perfil']='perfil';
            $function['Buscar Alumno']='buscar';
            $function['Estadísticas']='estadisticas';


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

       $this->view->show("perfil.php",$data);
}
}

?>