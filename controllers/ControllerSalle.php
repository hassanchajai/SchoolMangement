<?php
require_once "./middelwares/auth.php";
class ControllerSalle
{
    private $view;
    public function __construct($url)
    {
      
        if (CheckifAuth()) {
            if (isset($_GET["status"])  && isset($_GET["id"]) && $_GET["status"] == "delete") {
                $id = $_GET["id"];    
                $this->delete($id);
            } else {
                $this->index();
            }
        } else {
            header("location: salle");
        }
    }
    public function index()
    {
        $salle = new SalleManager;
        $allSalles = $salle->getallsalle();
        $this->view = new View("Salle");
        $this->view->generate(["salles" => $allSalles]);
    }
    public function delete($id)
    {
        $salle=new SalleManager;
        $salle->DeleteSalle($id);
        header("location: salle");
    }
}
