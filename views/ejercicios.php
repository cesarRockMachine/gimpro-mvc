<?php header('Content-type: text/html; charset=UTF-8'); ?>
<div id="content">


<script type="text/javascript" src="public/js/jquery-1.6.4.js"></script>

<script type="text/javascript">

    $(document).ready(function() {

        $('#lista_ejercicios').change(function() {
            var id_video = $(this).attr('value');
            var display = $("#show_video").attr('style');


            if (display == 'display:inline;')
                $("#show_video").toggle("5", false);
            if (!(id_video == ""))
                loadVideo(id_video);
            else
                $('#show_video').toggle(false);
            return false;
        });

        $("#contactLink").click(function() {
            if ($("#EjercicioForm").is(":hidden")) {
                $("#EjercicioForm").slideDown("slow");
            }
            else {
                $("#EjercicioForm").slideUp("slow");
            }
        });

        $(".submit").click(function() {
            // validate and process form here

            var name = $("input#name").val();
            //  alert(name);
            /*            if (name == "") {
                $("label#name_error").show();
                $("input#name").focus();
                return false;
            }*/
            var link = $("input#link").val();

            var zona = $('#input#zona').val();


            if (!(link == "")) {
                linkcode = getParameter(link, 'v');
            }
            else {
                alert("Ingrese un Link valido");
                return false;
            }

            if (!(zona == "")) {
                alert("Debe selecionar una Zona");
                return false;
            }

            var dataString = 'name=' + name + '&link=' + linkcode + '&zona=' + zona;

            $.ajax({
                type: "POST",
                url: "?controlador=Ejercicios&accion=agregar",
                data: dataString,
                success: function(data) {
                    if (data == "-1")
                        alert("Error: Los datos no han sido correctamente agregados");
                    else {
                        $("#inicio").after("", "<option  id='" + data + "' value='" + data + "'>" + name + "</option>");
                        alert("Ejercicio correctamente agregado");
                        closeForm();
                        return true;
                    }


                }

            });
            return false;

        });


    });


    function closeForm() {

        $("#formSent").show("slow");
        setTimeout('$("#formSent").hide();$("#EjercicioForm").slideUp("slow")', 2000);

    }

    //Obtiene code desde url youtube
    function getParameter(url, name) {
        var urlparts = url.split('?');
        if (urlparts.length > 1) {
            var parameters = urlparts[1].split('&');
            for (var i = 0; i < parameters.length; i++) {
                var paramparts = parameters[i].split('=');
                if (paramparts.length > 1 && paramparts[0] == name) {
                    return paramparts[1];
                }
            }
        }
        return null;
    }


    function loadVideo(id) {

        var xmlhttp;
        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //   alert(xmlhttp.responseText);
                var video = document.getElementById("show_video");

                var url = "http://www.youtube.com/embed/" + xmlhttp.responseText + "?rel=0";

                video.firstElementChild.setAttribute("src", url);
                $(video).toggle(true, "slow");

            }
        }

        xmlhttp.open("GET", "?controlador=Ejercicios&accion=video&id=" + id, true);
        xmlhttp.send();
    }
</script>


<h2>Ejercicios</h2>

<div id="box">
    <div id="addEjercicioFormContainer">
        <div id="EjercicioForm">
            <fieldset>
                <form id="sendejercicio" action="" method="POST">
                    <label for="name">Nombre del Ejercicio</label>
                    <input id="name" required type="text"/>
                    <label for="link">Link</label>
                    <input id="link" placeholder="http://www.youtube.com/watch?v=cl0IlD4qLUM" required
                           type="text"/>
                    <label for="zona">Zona</label>
                    <select id="zona">
                        <option value="" selected>Seleccionar zona</option>
                        <option value="1">Pectorales</option>
                        <option value="2">Espalda</option>
                        <option value="3">Biceps</option>
                        <option value="4">Triceps</option>
                        <option value="5">Hombros</option>
                        <option value="6">Pantorrilla</option>
                        <option value="7">Piernas</option>
                        <option value="8">Abdomen</option>
                    </select>
                    <input id="sendForm" class="submit" type="submit" name="submit"/>
                </form>
                <span id="formSent">Se agregado correctamente!</span>
            </fieldset>
        </div>
        <div id="contactLink"><input type="submit" value="Agregar Ejercicio"></div>
    </div>
</div>

<div class="post">

    <div class="entry">

        <?php
                                        echo '<select id="lista_ejercicios">';
        echo '<option id="inicio" value="" selected>--Seleccione Ejercicio--</option> ';

        //crea la lista de ejercicios
        while ($item = $listado->fetch())
        {

            echo "<option  id='" . $item['id_ejercicio'] . "' value='" . $item['id_ejercicio'] . "'>" . $item['nombre'] . "</option>";

        }
        echo "</select>";



        ?>
        <p></p>

        <div id="show_video" style="display:none;">

            <iframe width="560" height="315" src="" frameborder="0"
                    allowfullscreen></iframe>


        </div>

    </div>
</div>
</div>
