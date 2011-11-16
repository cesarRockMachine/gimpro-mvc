<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<script type="text/javascript"
src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript">

        $(document).ready(function(){

            $('.rutina').click(function() {
                var id_user = $(this).attr('id');
                var dataString = 'id_user='+id_user;
                //return false;

                $.ajax({
                    type: "POST",
                    url: "?controlador=Ejercicios&accion=addRutina",
                    data: dataString,
                    success: function(data) {
                         $("#resultado").empty();
                        $("#resultado").append(data);
                    }

                });
                  //$("#li").empty();
                return false;
            });
        });

</script>

</head>

<body>
<?php
if ($result != null) {
                            ?>
                            <legend> Resultados de la Búsqueda</legend>
                            <table border=1 cellspacing=1>

                <tr>
                    <th>Nombre Alumno</th>
                    <th>Profesor Encargado</th>
                    <th>Habilitado</th>
                    <th>Agregar Rutina</th>
                    <th>Fecha Registro</th>
                </tr>
                <?php foreach ($result as $entry)
            {
                ?>
							<tr><td>
							<?php echo $entry['nombres'] . " " . $entry['apellidos'] . "</td>";
                echo "<td>lala</td>";

                echo "<td>".$entry['habilitado']."</td>";
                echo "<td align='center'><input id='".$entry['id_user']."' class='rutina' type='button' value='+'> </td>";
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

</body>
</html>