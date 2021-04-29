<?php
require_once "./middelwares/auth.php";
class ControllerEns
{
    private $view;
    public function __construct($url)
    {
        if (CheckifAuth()) {

            if (isset($_GET["status"])  && isset($_GET["id"]) && $_GET["status"] == "delete") {
                $id = $_GET["id"];
                $iduser = $_GET["iduser"];
                $this->delete($id,$iduser);
            } else if (isset($_GET["status"])  && $_GET["status"] == "new") {
                $this->create();
            } else if (isset($_GET["status"])  && $_GET["status"] == "store") {
                $this->store();
            } else if (isset($_GET["status"]) && isset($_GET["id"])  && $_GET["status"] == "edit") {
                $id = $_GET["id"];
                // $this->edit($id);
            } else if (isset($_GET["status"]) &&  $_GET["status"] == "update") {
                // $this->update();
            } else {
                $this->index();
            }
        } else {
            header("location: dashboard");
        }
    }
    public function index()
    {
        $ens = new EnsManager;
        $this->view = new View("Ens");
        $this->view->generate(["ens" => $ens->getAllEns()]);
    }
    // public function update()
    // {
    //     $matiere=new MatiereManager;
    //     $matiere->updateMatiere();
    //     header("location: matiere");
    // }
    // public function edit($id)
    // {

    //     $matiere = new MatiereManager;
    //     $this->view = new View("AddMatiere");
    //     $this->view->generate(["matiere" => $matiere->getOneMatiere($id)]);
    // }
    public function store()
    {
        $ens = new EnsManager;
        $user = new UserManager;
        $id = $user->createone("ens");
        $ens->create($id);
        header("location: ens");
    }

    public function delete($id,$iduser)
    {
        $user = new UserManager;
        $ens = new EnsManager;
       $ens->Delete($id); 
       $user->Delete($iduser);
        
        header("location: ens");
    }
    public function create()
    {
        $matiere = new MatiereManager;
        $group = new GroupManager;
        $this->view = new View("AddEns");
        $this->view->generate(["matiere" => $matiere->getAllGMatiere(), "grps" => $group->getAllGroups()]);
    }
}
