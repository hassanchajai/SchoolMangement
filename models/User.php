<?php
class User 
{

    private $id;
    private $Email;
    private $Uid;
    private $Image;
    private $Role;
    private $pwd;

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
    public function setImage($value)
    {
        if (!empty($value)) {
            $this->Image = $value;
        }
    }
    public function setPwd($value)
    {
        if (!empty($value)) {
            $this->pwd = $value;
        }
    }
    public function setEmail($value)
    {
        if (!empty($value)) {
            $this->Email = $value;
        }
    }
    public function setUid($value)
    {
        if (!empty($value)) {
            $this->Uid = $value;
        }
    }
    public function setRole($value)
    {
        if (!empty($value)) {
            $this->Role = $value;
        }
    }
    public function getEmail(){
        return $this->Email;
    }
    public function getUid(){
        return $this->Uid;
    }
    public function getRole(){
        return $this->Role;
    }
    public function getImage(){
        return $this->Image;
    }
    public function getPassword(){
        return $this->pwd;
    }
  
 

}
