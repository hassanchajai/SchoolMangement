<?php



class View
{

    private $file;
    private $_t;


    public function __construct($action)
    {
        $this->file = "views/view" . $action . ".php";
    }

    public function generate($data)
    {
        $content =$this->generateFile($this->file,$data);

        // template
        $view=$this->generateFile("views/template.php",array("t"=>$this->_t,"content"=>$content));
        echo $view;
    }

    public function generateFile($file ="" , $data)
    {
        if (file_exists($file)) {
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        } else {
            throw new Exception("Fichier " . $file . " Introuvable",1);
        }
    }
 
    public function generateFileSimple($file=""){
        if(file_exists($file)){

            require $file;
        }
    }
}
