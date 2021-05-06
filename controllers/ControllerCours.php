<?php
class ControllerCours
{
    private $view;
    public function __construct()
    {
        if ($_GET["status"] == "dates") {
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

        $dt = $data->dt;

        $response = ["dt" => $dt];

        echo json_encode($response);
    }
}
