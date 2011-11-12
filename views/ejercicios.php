<div id="content">
    <script type="text/javascript" src="public/js/jquery-1.6.4.js"></script>

    <script type="text/javascript">

        $(document).ready(function() {

            $('#lista_ejercicios option').click(function() {
                var video = $(this).attr('value');
                video = "#" + video;
                $(video).slideToggle();
                return false;
            });

            $('#lista_ejercicios').change(function() {
                var id_video = $(this).attr('value');
                if(id_)loadVideo(id_video);
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
                   alert(xmlhttp.responseText);
                    document.getElementById("link2").innerHTML = xmlhttp.responseText;
                }
            }

            xmlhttp.open("GET", "?controlador=Ejercicios&accion=video&id="+ id, true);
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

                echo "<option  id='" . $item['id_ejercicio'] ."' value='" . $item['id_ejercicio'] . "'>" . $item['nombre'] . "</option>";

            }
            echo "</select>";



            ?>
            <div id="link2" style="display:none;">

                <object width="420" height="315">
                    <param name="movie"
                           value="http://www.youtube.com/v/_5LGaT4FxDM?version=3&amp;hl=en_US&amp;rel=0"></param>
                    <param name="allowFullScreen" value="true"></param>
                    <param name="allowscriptaccess" value="always"></param>
                    <embed src="http://www.youtube.com/v/_5LGaT4FxDM?version=3&amp;hl=en_US&amp;rel=0"
                           type="application/x-shockwave-flash" width="420" height="315" allowscriptaccess="always"
                           allowfullscreen="true"></embed>
                </object>


            </div>

        </div>
    </div>