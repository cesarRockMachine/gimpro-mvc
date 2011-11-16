<?php header('Content-type: text/html; charset=UTF-8');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES"

        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns="">

<head>

    <?php
    $titulo = $estructura['titulo'];
    $controlador = $estructura['controlador'];
    $habilitado = $estructura['habilitado'];
    if ($controlador == "Profesor")
        $id_profe = $estructura['id_profe'];
    else
        $id_profe="";
    $resp = array();
    $resp = $respuestas;

    ?>

    <title>Gimnasio III: <?php echo $titulo ?></title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="language" content="es"/>
    <link href="public/css/perfil.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="public/js/jquery-1.6.4.js"></script>

    <script>

        $(document).ready(function() {
            var controlador = '<?php echo $controlador ?>';
            var id = '<?php echo $id_profe ?>';


            $('#sidebar li').click(function() {

                var toLoad = $(this).attr('id');

                if (controlador == "Profesor" && toLoad == "perfil") {

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

       //        $(document).ready(function(){
          $('.btn').click(function(){

                var id = $(this).attr("id");
              showPerfil(id);

        });
});

    </script>

    <script language="javascript" type="text/javascript">
        function showPerfil(id) {
            var ajaxRequest;
            try {
                // Opera 8.0+, Firefox, Safari
                ajaxRequest = new XMLHttpRequest();
            } catch (e) {
                // Internet Explorer Browsers
                try {
                    ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e) {
                    try {
                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (e) {
                        // Something went wrong
                        alert("Your browser broke!");
                        return false;
                    }
                }
            }
            ajaxRequest.onreadystatechange = function() {
                if (ajaxRequest.readyState == 4) {
                    $('.entry').empty();
                    $('.entry').append(ajaxRequest.responseText);


                }
            }
            var queryString = "&id=" + id;
            ajaxRequest.open("GET", "?controlador=Profesor&accion=perfil_alumno" + queryString, true);
            ajaxRequest.send(null);

        }


    </script>


</head>

<body>


<div id="header">
    <!-- imagen cabecera del GYM -->
    <div id=image1></div>
</div>
    <!-- barra navegacion -->
<!-- header -->
<div id="main">
    <div id="main2">

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


            <div class="box"> <a href="?controlador=Index&accion=logout">Cerrar sesión</a> </div>
</div>

 <div id="content">

                <?php if ($controlador == "Profesor") { ?>
                <legend style="text-align:right"><h2>Ultimos Registrados </h2></legend>
                <?php } else { ?>
                <fieldset><legend style="text-align:right"><h2>Bienvenido ! </h2></legend>
                <?php } ?>



                <div class="post">

                    <!--  p con class postmeta -> css  <p class="postmeta">Posted in <a href="#">Class apent</a> | Apr 18, 2011 | <a href="#">4 comments</a></p> -->

                    <div class="entry">

    <?php

        if ($controlador == 'Profesor') {
            ?>


            <table border=0.5 style="text-align: center">
                <tr>
                    <th>Nombre Alumno</th>
                    <th>Nota Encuesta</th>
                    <th>Habilitado</th>
                    <th>Fecha Registro</th>
                    <th>Ver perfil</th>
                </tr>
                <?php

                while ($item = $welcome->fetch())
                {
                    echo "<tr><td>" . $item['nombres'] . " " . $item['apellidos'] . "</td>";
                    echo "<input name=''id_user' id='id_user2' type = 'hidden' value=" . $item['id_user'] . ">";
                    echo "<td>" . $item['nota_encuesta'] . "</td>";
                    echo "<td>" . $item['habilitado'] . "</td>";
                    echo "<td>" . $item['fecha_inicio'] . "</td>";
                    echo "<td><input id='" . $item['id_user'] . "' class='btn' type='button' value='ok'/></td></tr>";

                }
                ?>

            </table>
            <?php } else if ($controlador == "Alumno" && $habilitado == true) { ?>
            <p>Bienvenido alumno</p>
            <?php } else if ($controlador == "Alumno" && $habilitado == false && $resp == "") { ?>
            <p>Cuenta inhabilitada, espera de la aprobación n del profesor a cargo.</p>
            <?php } else if ($controlador == "Alumno" && $habilitado == false && $resp != "") { ?>

            <h3>Resultados encuesta</h3>
            <table>

                <td><b>Desayuno:</b> <?php echo $resp[0];   ?></td>
                <tr></tr>
                <td><b>Almuerzo:</b> <?php echo $resp[1];   ?></td>
                <tr></tr>
                <td><b>Consumo de agua:</b> <?php echo $resp[2];   ?></td>
                <tr></tr>
                <td><b>Tabaco:</b> <?php echo $resp[3];   ?></td>
                <tr></tr>
                <td><b>Alcohol:</b> <?php echo $resp[4];   ?></td>
                <tr></tr>
                <td><b>Drogas:</b> <?php echo $resp[5];   ?></td>
                <tr></tr>

                <td><b>Enfermedades:</b> <?php echo $resp[6];   ?></td>
                <tr></tr>

                <td><b>Lesiones:</b> <?php echo $resp[7];   ?></td>
                <tr></tr>

                <td><b>Medicamento:</b> <?php echo $resp[8];   ?></td>
                <tr></tr>

                <td><b>Autestima:</b> <?php echo $resp[9];   ?></td>
                <tr></tr>

                <td><b>Actividad física:</b> <?php echo $resp[10];   ?></td>

            </table>
            <?php } ?>
     </div> </div>
     </fieldset>

     </div>
<div class="clearing">&nbsp;</div>

                    </div>

    </div>




                    <!-- main --><!-- main2 -->



                    <div id="footer">

                        <p>Copyright &copy; 2011, designed by GymPro</p>

                    </div>
</body>

</html>