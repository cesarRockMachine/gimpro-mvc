<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES"

"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns=""> 
<?php header ('Content-type: text/html; charset=iso-8859-1'); ?>

<html>


<script>

    var id_ejercicio,nombre_ejercicio;
    function agregar(id,nombre) {
       id_ejercicio=id;
        nombre_ejercicio=nombre;

        if(document.getElementById('nombre_usuario').getData==''){
            $('#nombre_usuario').hide()
        }
          if(id=='valor'){
            $('#celda').hide();
        }  else{ $('#celda').show();
          }
        $('#nombre_usuario').empty();
        $('#nombre_usuario').append(nombre);

    }

    $(document).ready(function() {
        
          $('.enviar').click(function() {
             var id_user = $('#id_user').innerText;
              var ciclo = $("#ciclo").val();
              var max = $("#maximal").val();
              var carga = $("#carga").val();
              var pausa = $("#pausa").val();
              var repeticion = $("#repeticion").val();
              var series = $("#series").val();
              var dataString;
              if(ciclo=='' || max=='' ||carga==''|| pausa==''||repeticion==''|| series =='')  dataString='';
              else dataString = 'id_user='+id_user+'&ciclo='+ciclo +'&maximal='+max+'&carga='+carga+'&pausa='+pausa+'&repeticiones='+repeticion+'&series='+series+'&id_ejercicio='+ id_ejercicio;

              if(dataString=='')alert('MAL,agregue todos los  valores de los campos pedidos');
              else{
                $.ajax({
                    type: "POST",
                    url: "?controlador=Ejercicios&accion=GuardarCicloEjercicio",
                    data: dataString,
                    success: function(data) {

                      }
                }
                );
              }
          });


      });

function mostrar() {
            $('#celda').hide();
    }
    
</script>
<head>
    <br>
<h2>Ejercicio</h2>
<select id="lista_ejercicios">
   <option onclick="agregar(this.value,this.id)" id="valor" value="valor" selected>Seleccionar ejercicio </option>
<script> mostrar()</script>
    <?php

    while ($row = $listado->fetch()) {
    echo'<option onclick = agregar(this.value,this.id) id ="'.$row['nombre'].'"  value="'.$row['id_ejercicio'].'">'.$row['nombre'].' </option>';

}

?>
    </Select>
<br>
<div id="celda">
    <div id="id_user" style="display:none"><?php echo $datos_user['id_usuario'] ?></div>
    <div id='datos_user'> <p><h2>Alumno: <?php echo $datos_user['nombres']." ".$datos_user['apellidos']?></h2></p> </div>

    <form>
  <table border="1">
   <tr>
       <th>Ejercicio</th>
       <th>Ciclo</th>
       <th>Max</th>
       <th>Carga</th>
       <th>Pausa</th>
       <th>Rept.</th>
       <th>Series</th>
   </tr>
      <br>
    <tr>
        <?php echo'<td id="nombre_usuario"</td>';  ?>

       <td> <input type="text" size="3" id="ciclo"</td>
       <td> <input type="text" size="3" id="maximal"</td>
       <td> <input type="text" size="3" id="carga"</td>
       <td> <input type="text" size="3" id="pausa"</td>
       <td> <input type="text" size="3" id="repeticion"</td>
       <td> <input type="text" size="3" id="series"</td></tr>



 </table>
        <br>
   <input align="right" type="button" class="enviar" value="agregar">
   <input align="right" type="reset"  value="borrar">
     </form>
      </div>

   </html>
