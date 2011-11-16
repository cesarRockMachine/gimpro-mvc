<?php
class IndexController extends ControllerBase
{

    //Accion index
    public function index()
    {
        if (isset($_SESSION['logeado']))
            $this->view->show("welcome.php");
        else
            $this->login();
    }


    public function login()
    {
        $this->view->show("login.php");
    }

    public function registrar()
    {
        $this->view->show("registrar.php");
    }

    public function logout()
    {

        session_start();
        session_destroy();
        $this->view->show("login.php");
    }

}

?>