<div id="content">
    <script type="text/javascript" src="public/js/jquery-1.6.4.js"></script>

    <script type="text/javascript">

        $(document).ready(function() {

            /*            $('#lista_ejercicios option').click(function() {
                var video = $(this).attr('value');
                video = "#" + video;
                $(video).slideToggle();
                return false;
            });*/
            //   $("#show_video").toggle("fast");
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


        });

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

                    var url = "http://www.youtube.com/embed/"+xmlhttp.responseText+"?rel=0";

                    video.firstElementChild.setAttribute("src",url);
                    $(video).toggle(true, "slow");
                    
                }
            }

            xmlhttp.open("GET", "?controlador=Ejercicios&accion=video&id=" + id, true);
            xmlhttp.send();
        }
    </script>
    <h2>Ejercicios</h2>

    <div class="post">

        <div class="entry">

            <?php
            echo '<select id="lista_ejercicios">';
            echo '<option id="0" selected> Seleccione el video a mostrar </option> ';

            //crea la lista de ejercicios
            while ($item = $listado->fetch())
            {

                echo "<option  id='" . $item['id_ejercicio'] . "' value='" . $item['id_ejercicio'] . "'>" . $item['nombre'] . "</option>";

            }
            echo "</select>";



            ?>
            <p></p>
            <div id="show_video" style="display:none;">

                <iframe width="560" height="315" src="http://www.youtube.com/embed/eNtTmv8kBtA?rel=0" frameborder="0"
                        allowfullscreen></iframe>


            </div>

        </div>
    </div>