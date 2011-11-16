<?php header('Content-type: text/html; charset=iso-8859-1'); ?>
<script language="javascript" type="text/javascript">

function pulsar(e) {
	tecla=(document.all) ? e.keyCode : e.which;
  if(tecla==13) return false;
}
    $(document).ready(function() {

        $("input#boton").click(function() {

            var query = $("input#q").val();
            var dataString = "q=" + query;
            $.ajax({
                type: "POST",
                url: "?controlador=Profesor&accion=buscarAlumno",
                data: dataString,
                success: function(data) {
                    $('#resultado').empty();
                    $("#resultado").append(data);
                }


            });
        });

        $('.rutina').click(function() {
            var id_user = $(this).attr('id');
            alert(id_user);

            var dataString = 'id_user=' + id_user;
            alert(id_user);
            //return false;

            $.ajax({
                type: "POST",
                url: "?controlador=Ejercicios&accion=addRutina",
                data: dataString,
                success: function(data) {
                    //      $("#listar").empty();
                    //       $("#listar").append(data);
                }

            });
            //   $("#listar").empty();
            return false;
        });
    });
</script>


<div id="barra" class="entry" align="center">
    <form id="query" name="query" action="" method="GET">
        <input name="q" id="q" type="text" value="<?php if (isset($q)) echo $busqueda;?>" onkeypress="return pulsar(event)">
        <input id="boton" type="button" value="Buscar" onkeypress="return pulsar(event)">
        <span id="cargando-buscar"></span>
    </form>

</div>

<div id="resultado">
</div>
