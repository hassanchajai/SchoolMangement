<?php 
require_once "./middelwares/auth.php";
class ControllerGroup{
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
        $groups=new GroupManager;
        $this->view=new View("Group");
        $this->view->generate(["groups"=>$groups->getAllGroups()]);
    }
    public function update()
    {
        $group=new GroupManager;
        $group->updateGroup();
        header("location: group");
    }
    public function edit($id)
    {

        $group = new GroupManager;
        $this->view = new View("AddGroup");
        $this->view->generate(["group" => $group->getOneGroups($id)]);
    }
    public function store()
    {
        $group = new GroupManager;
        $group->createGroup();
        header("location: group");
    }

    public function delete($id)
    {
        $group = new GroupManager;
        $group->deleteGroup($id);
        header("location: group");
    }
    public function create()
    {
        $this->view = new View("AddGroup");
        $this->view->generate([]);
    }
}