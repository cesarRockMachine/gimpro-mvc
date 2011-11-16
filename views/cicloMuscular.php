<div id="content">
    <script type="text/javascript" src="public/js/jquery-1.6.4.js"></script>

    <script type="text/javascript">

        $(document).ready(function() {
                var id_user = <?php echo $id_user; ?>

            $('#lista_ejercicios').change(function() {
                var id_zona = $(this).attr('value');

                var dataString = 'id_zona=' + id_zona +'&id_user='+id_user;
                //return false;
                if(id_zona!=''){
                $.ajax({
                    type: "POST",
                    url: "?controlador=Ejercicios&accion=ListarZona",
                    data: dataString,
                    success: function(data) {
                         $("#listar").empty();
                        $("#listar").append(data);
                    }

                });
                }
                  $("#listar").empty();
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


       
    </script>

    <?php

      session_start();

     $_SESSION['id_user']= $id_user;

    ?>


    <h2>Zonas de Ejercicios</h2>


    <div class="post">


        <div class="entry">


             <select id="lista_ejercicios">
             <option  value="" selected>Seleccionar zona </option>
             <option  value="1" >Pectorales</option>
             <option  value="2" >Espalda</option>
             <option  value="3" >Biceps</option>
             <option  value="4" >Triceps</option>
             <option  value="5" >Hombros</option>
             <option  value="6" >Pantorrilla</option>
             <option  value="7" >Piernas</option>
             <option  value="8" >Abdomen</option>
               </Select>

         
            <div id="listar">

            </div>

        </div>
    </div>
</div>