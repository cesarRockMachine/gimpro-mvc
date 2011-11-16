<div id="content">


    <legend style="text-align:right"><h2>Ultimos Registrados </h2></legend>

    <div class="post">

        <div class="entry">

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
                 ?>

            </table>


        </div>

    </div>
</div>
