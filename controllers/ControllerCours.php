<?php
class ControllerCours
{
    private $view;
    public function __construct()
    {
        if (  isset($_GET["status"]) && $_GET["status"] == "dates") {
            $this->dates();
        } else {
            $this->index();
        }
    }
    public function index()
    {


        $this->view = new View("Cours");
        $this->view->generate([]);
    }
    public function dates()
    {
        header("Access-Control-Allow-origin: *");
        header("Content-Type: application/json");
        header("Access-Control-Allow-Methods: POST");
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

        
        $data = json_decode(file_get_contents("php://input"));

        $horraire=array("8-10","10-12","2-4","4-6");

        $courManager=new CoursManager;

        $horraireFiltred=array();

        $dt = $data->dt;

        $cours= $courManager->getHorrarie($dt);

        // foreach ($horraire as $cour) {
        //     if(!in_array($cour,$cours)[{
        //         $horraireFiltred[]=;
        //     }
        // }

        $response = ["data" => $cours];

        echo json_encode($response);
    }
}
