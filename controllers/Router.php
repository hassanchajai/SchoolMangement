<?php
require_once 'views/view.php';

class Router
{

    public function ReqRoute()
    {
        try {
            
            spl_autoload_register(function($class){
                require_once "models/".$class;
               
            });
            $url="";

            if(isset($_GET["url"])){
                
                $url=explode("/",filter_var($_GET["url"],FILTER_SANITIZE_URL));
                $controller=ucfirst((strtolower($url[0])));
                $controllerClass="Controller".$controller;
                $controllerFile="controllers/".$controllerClass.".php";
                if(file_exists($controllerFile)){
                    require_once $controllerFile;
                    $this->ctrl=new $controllerClass($url);
                }
                else{
                   
                    require_once "controllers/ControllerAccueil.php";
                    $this->ctrl=new ControllerAccueil();
                   
                }
            }
            else{
                
                require_once "controllers/ControllerAccueil.php";
                $this->ctrl=new ControllerAccueil();
               
            }



        } catch (Exception $th) {
            $error = $th->getMessage();
            echo $error;
        }
    }
}
