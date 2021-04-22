<?php
require_once "./middelwares/auth.php";
class ControllerAuthentification
{
    private $view;
    public function __construct()
    {
        if (CheckifAuth()) {
            header("location: " . $_SERVER["HTTP_HOST"]);
        } else {
            $this->index();
        }
    }
    private function index()
    {
        $this->view = new View("Signin");
        $this->view->generateFileSimple("views/viewSignin.php");

    }
    private function signin()
    {
    }
    private function signout()
    {
    }
}
