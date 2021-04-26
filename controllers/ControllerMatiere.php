<?php 
require_once "./middelwares/auth.php";
class ControllerMatiere{
    private $view;
    public function __construct($url)
    {
        if(CheckifAuth()){
        
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
            else{
               $this->index(); 
            }
            
        }
        else{
            header("location: dashboard");
        }
    }
    public function index(){
        $matiere=new MatiereManager;
        $this->view=new View("Matiere");
        $this->view->generate(["matiere"=>$matiere->getAllGMatiere()]);
    }
    public function update()
    {
        $matiere=new MatiereManager;
        $matiere->updateMatiere();
        header("location: matiere");
    }
    public function edit($id)
    {

        $matiere = new MatiereManager;
        $this->view = new View("AddMatiere");
        $this->view->generate(["matiere" => $matiere->getOneMatiere($id)]);
    }
    public function store()
    {
        $matiere = new MatiereManager;
        $matiere->createMatiere();
        header("location: matiere");
    }

    public function delete($id)
    {
        $matiere = new MatiereManager;
        $matiere->DeleteMatiere($id);
        header("location: matiere");
    }
    public function create()
    {
        $this->view = new View("AddMatiere");
        $this->view->generate([]);
    }
}