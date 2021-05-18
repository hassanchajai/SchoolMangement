<?php 

class Cour{

    private $id;
    private $horraire;
    private $dt;
    private $idSalle;
    private $idEns;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    } 

    public function setId($value){
        if(!empty($value)){
            return $this->id=$value;
        }
    }

    public function setHorraire($value){
        if(!empty($value)){
            return $this->horraire=$value;
        }
    }
    public function setDt($value){
        if(!empty($value)){
            return $this->dt=$value;
        }
    }
    public function setIdsalle($value){
        if(!empty($value)){
            return $this->idSalle=$value;
        }
    }
    public function setIdEns($value){
        if(!empty($value)){
            return $this->idEns=$value;
        }
    }

    public function getHorraire(){
        return $this->horraire;
    }
    public function getIdSalle(){
        return $this->idSalle;
    }
    public function getDt(){
        return $this->dt;
    }
    public function getId(){
        return $this->id;
    }
    public function getIdEns(){
        return $this->idEns;
    }


}