<script language="javascript" type="text/javascript">


    $(document).ready(function() {

        $("input#boton").click(function() {

            var query = $("input#q").val();
            var dataString = "q=" + query;
            alert(dataString)
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

    })
            ;
</script>


<div id="barra" class="entry" align="center">
    <form id="query" name="query" action="" method="GET">
        <input name="q" id="q" type="text" value="<?php if (isset($q)) echo $busqueda;?>">
        <input id="boton" type="button" value="Buscar" on>
        <span id="loading"></span>
    </form>

</div>

<div id="resultado">
</div>

</div>
