<?php 
 
 class Group{
     private $id;
     private $libelle;
     private $effectif;
     
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
    public function setLibelle($value){
        if(!empty($value)){
            $this->libelle=$value;
        }
    } 
    public function setEffectif($value){
        if(!empty($value)){
            $this->effectif=$value;
        }
    } 
    public function setId($value){
        if(!empty($value)){
            $this->id=$value;
        }
    } 
    public function getId(){
        return $this->id;
    }
    public function getLibelle(){
        return $this->libelle;
    }
    public function getEffectif(){
        return $this->effectif;
    }
 }