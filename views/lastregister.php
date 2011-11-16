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

                while ($item = $last->fetch())
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