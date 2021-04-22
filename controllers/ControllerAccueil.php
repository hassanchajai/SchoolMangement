<?php
require_once "./middelwares/auth.php";
class ControllerAccueil
{
    private $view;
    public function __construct()
    {
        if(CheckifAuth()){
            $this->index();
        }
        else{
            header("location: authentification");
        }
       
    }
    public function index()
    {
        
        $this->view = new View("Dashboard");
        $this->view->generate([]);
    }
}
