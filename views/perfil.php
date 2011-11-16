<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES"

        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns="">

<head>

    <?php
           header('Content-type: text/html; charset=utf-8');
    $titulo = $estructura['titulo'];
    $controlador = $estructura['controlador'];
    ?>

    <title>Gimnasio III: <?php echo $titulo ?></title>

    <meta name="keywords" content=""/>

    <meta name="description" content=""/>

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>

    <meta name="language" content="es"/>

    <link href="public/css/perfil.css" rel="stylesheet" type="text/css"/>

    <script type="text/javascript" src="public/js/jquery-1.6.4.js"></script>

    <script>

        $(document).ready(function() {
            var controlador = '<?php echo $controlador ?>';


            $('#sidebar li').click(function() {

                var toLoad = $(this).attr('id');

                if (controlador == "Profesor" && toLoad == "perfil") {
                    var id = "1"; //cambiar por el valor que deberia devolver session
                    toLoad = "?controlador=" + controlador + "&accion=" + toLoad + "&id=" + id;

                }
                else var toLoad = "?controlador=" + controlador + "&accion=" + toLoad;


                //    alert (toLoad);

                $('#content').hide('fast', loadContent);
                $('#load').remove();
                //$('#wrapper').append('<span id="load">LOADING...</span>');
                $('#load').fadeIn('normal');
                // window.location.hash = $(this).attr('href').substr(0,$(this).attr('href').length-5);
                function loadContent() {
                    $('#content').load(toLoad, '', showNewContent())
                }

                function showNewContent() {
                    $('#content').show('slow', hideLoader());
                }

                function hideLoader() {
                    $('#load').fadeOut('normal');
                }

                return false;
            });


        });


    </script>

</head>

<body>


<div id="header">
    <!-- imagen cabecera del GYM -->
    <div id=image1></div>

    <!-- barra navegacion -->
    <nav>
        <ul>
            <li><a href="http://www.utfsm.cl/">USM</a></li>
            <li><a href="http://www.defider.utfsm.cl">Defider</a></li>
        </ul>
    </nav>

</div>
<!-- header -->

<div id="main">
    <div id="main2">

        <!-- nuestro menu principal... fijarse que es sidebar y dentro de este va el li con el id que registra la accion a realizar-->
        <div id="sidebar">

            <h2>Menu Principal</h2>

            <ul>


    <?php

        foreach ($menu_visual as $item)
        {

            $over = "this.className='on'";
            $out = "this.className='off'";
            echo "<li class='off' id='" . $function[$item] . "'" . ' onmouseover="' . $over . '" onmouseout="' . $out . '">' . $item . "</li>";
        }
        ?>

            </ul>


        </div>
        <!-- sidebar -->

        <div id="content">

            <legend style="text-align:right"><h2>Ultimos Registrados </h2></legend>

            <div class="post">

                <div class="entry">

    <?php
                   /**
    header ('Content-type: text/html; charset=iso-8859-1');
    //ToDo: verificar que sea un profesor. agregar links con perfil de usuario.
    include_once('includes/header.php');
    $array = array();

    $array = new Usuarios();
    $last= array();
    $last=$array->getLastRegister();
     */



        ?>
        <table border=0.5 style="text-align: center">
            <tr>
                <th>Nombre Alumno</th>
                <th>Nota Encuesta</th>
                <th>Habilitado</th>
                <th>Fecha Registro</th>
            </tr>
    <?php

            while ($item = $welcome->fetch())
            {
                echo "<tr><td><a href='perfil.php?id=" . $item['id_user'] . " title='Ver Perfil''>" . $item['nombres'] . " " . $item['apellidos'] . "</a></td>";
                echo "<td><a href='result_encuesta.php?id=" . $item['id_user'] . " title='Ver Perfil''>" . $item['nota_encuesta'] . "</a></td>";
                //  if($item->isHabilitado())
                //	  echo "<td>".$item->getPerfil()."</td>";
                //  else
                echo "<td><a href='link para cuadro de habilitacion' title='Click para Habilitar'>No</a></td>";
                echo "<td>" . $item['fecha_inicio'] . "</td></tr>";

            }

            /**
            foreach ($last as $ultimo)
            { echo "<tr><td><a href='perfil.php?id=".$ultimo->getIDUser()."&flag=1 title='Ver Perfil''>".$ultimo->getNombres()." ".$ultimo->getApellidos()."</a></td>";
            echo "<td><a href='result_encuesta.php?id=".$ultimo->getIDUser()." title='Ver Perfil''>".$ultimo->getNota_encuesta()."</a></td>";
            //  if($ultimo->isHabilitado())
            //	  echo "<td>".$ultimo->getPerfil()."</td>";
            //  else
            echo "<td><a href='link para cuadro de habilitacion' title='Click para Habilitar'>No</a></td>";
            echo "<td>".$ultimo->getFecha_inicio()."</td></tr>";

            }
             */?>

        </table>


                </div>

            </div>


        </div>

        <!-- fin del content -->

        <div class="clearing">&nbsp;</div>

    </div>
</div>
<!-- main --><!-- main2 -->

<div id="footer">

    <p>Copyright &copy; 2011, designed by <a href="http://www.webtemplateocean.com/">WebTemplateOcean.com</a></p>

</div>

<div style="text-align: center; font-size: 0.75em;">Design downloaded from <a href="http://www.freewebtemplates.com/">free
    website templates</a>.
</div>
</body>

</html>