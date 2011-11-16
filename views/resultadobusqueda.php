<?php
if ($result != null) {
                            ?>
                            <legend> Resultados de la Búsqueda</legend>
                            <table border=1 cellspacing=1>

                <tr>
                    <th>Nombre Alumno</th>
                    <th>Profesor Encargado</th>
                    <th>Habilitado</th>
                    <th>Fecha Registro</th>
                </tr>
                <?php foreach ($result as $entry)
            {
                /*$profe = new Profesor();
                $profe = $profe->getIDProfesorbyAlumno($entry->getIDUser());
                $profe = $profe->getIDprofesor();
                $userP = new Usuarios();
                $userP = $userP->getRegistroUsuario($profe);*/


                //$lala = "perfil_avp.php?id=" . $entry->getIDUser() . "&flag=1";
                ?>
							<tr><td>
							<?php echo $entry['nombres'] . " " . $entry['apellidos'] . "</td>";
                echo "<td>lala</td>";
                //  if($entry->isHabilitado())
                //	  echo "<td>".$entry->getPerfil()."</td>";
                //  else
                echo "<td><a href='link para cuadro de habilitacion' title='Click para Habilitar'>No</a></td>";
                echo "<td>" . $entry['fecha_inicio'] . "</td></tr>";
            }?>

            </table>
        <?php

        }
        else
        {
            echo     " <legend> Resultados de busqueda </legend> No se encontraron usuarios.<br> Intente con otros criterio de busqueda";

        }
?>

