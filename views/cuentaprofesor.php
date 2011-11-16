<?php header('Content-type: text/html; charset=iso-8859-1'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>

  <script type="text/javascript"
    src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>


    <script type="text/javascript">

        $(document).ready(function() {


            $('.data-class').click(function() {

                var id = $("input#id_profe").val();
                var nombres = $("input#nombres").val();
                var apellidos = $("input#apellidos").val();
                var hobbie = $("input#hobbie").val();
                var email = $("input#email").val();
                var celular = $("input#celular").val();


                var dataString = 'nombres=' + nombres + '&apellidos=' + apellidos + "&hobbie=" + hobbie + "&email=" + email +
                "&celular=" + celular + "&id=" + id;
                alert(dataString);
                //return false;
                $.ajax({
                    type: "POST",
                    url: "?controlador=Profesor&accion=update_personales",
                    data: dataString,
                    success: function(data) {
                        alert("Datos correctamente Modificados");
                        /*  else {
                            $("#inicio").after("", "<option  id='" + data + "' value='" + data + "'>" + name + "</option>");
                            alert("Ejercicio correctamente agregado");
                            closeForm();
                            return true;
                        }*/


                    }

                });
                return false;

            });


        //Default Action
        $(".tab_content").hide(); //Hide all content
        $("ul.tabs li:first").addClass("active").show(); //Activate first tab
        $(".tab_content:first").show(); //Show first tab content

        //On Click Event
        $("ul.tabs li").click(function() {
            $("ul.tabs li").removeClass("active"); //Remove any "active" class
            $(this).addClass("active"); //Add "active" class to selected tab
            $(".tab_content").hide(); //Hide all tab content
            var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
            $(activeTab).fadeIn(); //Fade in the active content
            return false;
        });

        })
        ;
    </script>

</head>

<body>

<div class="container">

    <ul class="tabs">
        <li><a href="#tab1">Datos personales</a></li>
        <li><a href="#tab2">Datos acad&eacute;micos</a></li>
        <li><a href="#tab3">Datos cuenta</a></li>
    </ul>

    <div class="tab_container">

        <div id="tab1" class="tab_content">

            <form name="Datos Personales" method="post" autocomplete="off">
            <td><input id="id_profe" name="id" type="hidden" value="<?php echo $_GET['id']; ?>"></td>
            <table>
                <tr>
                    <td>Nombres:</td>
                    <td><input type="text" name="nombres" id="nombres" value="<?php echo $datos['nombres']; ?>"></td>
                </tr>
                <tr>
                    <td>Apellidos:</td>
                    <td><input type="text" name="apellidos" id="apellidos" value="<?php echo $datos['apellidos']; ?>"
                    </td>
                </tr>

                <tr>
                    <td>Hobbies:</td>
                    <td><input type="text" name="hobbie" id="hobbie" value="<?php echo $datos['hobbie']; ?>"</td>
                </tr>
                <tr>
                    <td>Celular:</td>
                    <td><input id="celular" name="celular" type="tel" pattern="[0-9]{8}" size="10"
                               value="<?php echo $datos['celular']; ?>"></td>
                </tr>
                <tr>

                <tr>
                    <td>Email:</td>
                    <td><input id="email" name="email" type="email" pattern=".+\@.+\..+" size="30"
                               value="<?php  echo $datos['email'];?>"></td>
                </tr>
                <tr>

              <!--  <tr>
                    <td>Foto:</td>
                    <td><input id="foto" name="foto" type="image" size="30" src="public/img/avatar.gif"></td>
                </tr>
                <tr>-->
                    <td><input type="reset" value="Restablecer"></td>
                    <td></td>
                    <td><input class="data-class" type="button" value="Enviar"></td>
                </tr>
            </table>
            </form>

        </div>

        <div id="tab2" class="tab_content">
            <form name="datos_academicos"  autocomplete="off"
            ">
            <table>
                <tr>
                    <td>Profesi&oacute;n:</td>
                    <td><input id="profesion" name="profesion" type="text" size="50"
                               value="<?php echo $datos['profesion']; ?>"></td>
                </tr>
                <tr>
                    <td>Instituci&oacute;n:</td>
                    <td><input id="institucion" name="institucion" type="text" size="50"
                               value="<?php echo $datos['institucion'];?>"></td>
                </tr>
                <tr>
                    <td><input type="reset" value="Restablecer"></td>
                    <td></td>
                    <td><input class="academico"type="submit" value="Enviar"></td>
                </tr>
            </table>
            </form>

        </div>

        <div id="tab3" class="tab_content">
            <form action="#" name="Datos cuenta" method="post" autocomplete="off"
            ">
            <table>
                <tr>
                    <td>Username:</td>
                    <td><input id="user" name="user" type="text" size="30" value="<?php echo $datos['username']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input id="pass" name="pass" type="password" size="30" value="<?php echo $datos['password'];?>">
                    </td>
                </tr>
                <tr>
                    <td><input type="reset" value="Restablecer"></td>
                    <td></td>
                    <td><input type="submit" value="Enviar"></td>
                </tr>
            </table>
            </form>

        </div>
    </div>

</div>
<
</body>
</html>
