<?php
class IndexController extends ControllerBase
{

    //Accion index
    public function index()
    {
        if ($_SESSION['logeado'] == 1)
            $this->view->show("welcome.php");
        else
            $this->login();
    }

    public function login()
    {
        $this->view->show("login.php");
    }

    public function validate()
    {
        require 'models/AuthModel.php';
        $auth = new AuthModel();


        if ($_SESSION['logeado'] == 0) {
            $validado = $auth->Validar($_POST['username'], $_POST['password']);
            if ($validado) {
                session_start();
                $_SESSION['logeado'] = 1;
                $_SESSION['nombre'] = $_POST['username'];

                $this->index();


            }
            else
                $this->index();
        }
    }


}

?>