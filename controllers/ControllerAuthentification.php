<?php
require_once "./middelwares/auth.php";
class ControllerAuthentification
{
    private $view;
    public function __construct()
    {
        if (CheckifAuth()) {
            if(isset($_GET["status"]) && $_GET["status"]=="signout"){
                $this->signout();
            }
            else{
                header("location: dashboard");
            }
            
        } else {
            if (isset($_GET['status']) && isset($_GET['status']) == "signin") {
                $this->signin();
            }
             else {
                $this->index();
            }
        }
    }
    private function index()
    {
        $this->view = new View("Signin");
        $this->view->generateFileSimple("views/viewSignin.php");
    }
    private function signin()
    {

        $uid = $_POST["uid"];
        $pwd = $_POST["pwd"];
        $user = new User([]);
        if ($user->signin($uid, $pwd)) {
            header("location: dashboard");
        } else {
            header("location: authentification&error=Email Or password Incorrect");
        }
    }
    private function signout()
    {
        $user = new User([]);
        $user->signout();
        header("location: authentification");
    }
}
