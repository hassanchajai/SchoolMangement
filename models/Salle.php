<?php
class Salle 
{

    private $id;
    private $capacity;
    private $libelle;
   

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
    protected function setCapacity($value)
    {
        if (!empty($value)) {
            $this->capacity = $value;
        }
    }
    protected function setId($value)
    {
        if (!empty($value)) {
            $this->id = $value;
        }
    }
    protected function setLibelle($value)
    {
        if (!empty($value)) {
            $this->libelle = $value;
        }
    }
   public function getCapacity(){
       return $this->capacity;
   }
  
   public function getLibelle(){
    return $this->libelle;
}
public function getId(){
    return $this->id;
}

}
