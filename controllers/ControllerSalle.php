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
            } else if (isset($_GET["status"])  && $_GET["status"] == "new") {
                $this->create();
            } else if (isset($_GET["status"])  && $_GET["status"] == "store") {
                $this->store();
            } else if (isset($_GET["status"]) && isset($_GET["id"])  && $_GET["status"] == "edit") {
                $id = $_GET["id"];
                $this->edit($id);
            } 
            else if(isset($_GET["status"]) &&  $_GET["status"] == "update"){
                $this->update();
            }
            else {
                $this->index();
            }
        } else {
            header("location: authentification");
        }
    }
    public function update()
    {
        $salle=new SalleManager;
        $salle->updateSalle();
        header("location: salle");
    }
    public function edit($id)
    {

        $salle = new SalleManager;
        $this->view = new View("AddSalle");
        $this->view->generate(["salle" => $salle->getSingleSalle($id)]);
    }
    public function store()
    {
        $salle = new SalleManager;
        $salle->createSalle();
        header("location: salle");
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
        $salle = new SalleManager;
        $salle->DeleteSalle($id);
        header("location: salle");
    }
    public function create()
    {
        $this->view = new View("AddSalle");
        $this->view->generate([]);
    }
}
