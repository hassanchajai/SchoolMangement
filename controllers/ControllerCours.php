<?php
require_once "./middelwares/auth.php";
class ControllerCours
{
    private $view;
    public function __construct()
    {
        if(CheckifAuth()){
            if (isset($_GET["status"]) && $_GET["status"] == "dates") {
                $this->dates();
            } 
            else if (isset($_GET["status"]) && $_GET["status"] == "store") {
                $this->store();
            } 
            else if (isset($_GET["status"]) && $_GET["status"] == "delete") {
                $id=$_GET["id"];
                $this->delete($id);
            } 
            else if (isset($_GET["status"]) && $_GET["status"] == "cours") {
                $this->cours();
            }
            else {
                $this->index();
            }
        }else{
            header("location: authentification");
        }
       
    }
    public function index()
    {
        $salleManager = new SalleManager;
        $salles = $salleManager->getallsalle();

        $ensManager=new EnsManager;
        $idens=$ensManager->getIdEns($_SESSION["user_id"]);
        
        $this->view = new View("Cours");
        $this->view->generate(["salles" => $salles,"idens"=>$idens]);
    }
    public function store(){
        header("Access-Control-Allow-origin: *");
        header("Content-Type: application/json");
        header("Access-Control-Allow-Methods: POST");
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


        $data = json_decode(file_get_contents("php://input"));
    
        $cours=new CoursManager;
        
        $salle=new SalleManager;

        $cours->insert($data->hor,$data->dt,$data->idens,$data->idSalle);

        $sa=Array();

        foreach ($cours->getAllCours() as $key => $value) {
            if($value->getIdEns() == $data->idens){
                $sa[]=[
                    "id"=>$value->getId(),
                    "hor"=>$value->getHorraire(),
                    "date"=>$value->getDt(),
                    "Salle"=>$salle->getSingleSalle($value->getIdSalle())->getLibelle()
                  ];
            }
      
        }
        $response=["message"=>"Cours Created successfuly","cours"=>$sa];

        echo json_encode($response);

    }
    public function dates()
    {
        header("Access-Control-Allow-origin: *");
        header("Content-Type: application/json");
        header("Access-Control-Allow-Methods: POST");
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


        $data = json_decode(file_get_contents("php://input"));


        $horraires = array("8-10", "10-12", "2-4", "4-6");

        $courManager = new CoursManager;

        $horraireFiltred = array();

        $dt = $data->dt;

        $idSalle = $data->idSalle;

        $cours = $courManager->getHorrarie($dt, $idSalle);

        foreach ($horraires as $horraire) {
            if (!in_array($horraire, $cours)) {
                $horraireFiltred[] = $horraire;
            }
        }

        $response = ["data" => $horraireFiltred];

        echo json_encode($response);
    }
    public function cours(){
        header("Access-Control-Allow-origin: *");
        header("Content-Type: application/json");
        header("Access-Control-Allow-Methods: POST");
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


        $data = json_decode(file_get_contents("php://input"));
    
        $cours=new CoursManager;
        
        $salle=new SalleManager;

        $sa=Array();

        foreach ($cours->getAllCours() as $key => $value) {
            if($value->getIdEns() == $data->idens){
                $sa[]=[
                    "id"=>$value->getId(),
                    "hor"=>$value->getHorraire(),
                    "date"=>$value->getDt(),
                    "Salle"=>$salle->getSingleSalle($value->getIdSalle())->getLibelle()
                  ];
            }
      
        }
        $response=["cours"=>$sa];

        echo json_encode($response);
    }
    public function delete($id){
        $courManager=new CoursManager;
        $courManager->delete($id);
        header("location: cours");
    }
}
