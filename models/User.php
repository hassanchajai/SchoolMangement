<?php
class User 
{

    private $id;
    private $Email;
    private $Uid;
    private $image;
    private $role;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $method($value);
            }
        }
    }
    public function setImage($value)
    {
        if (!empty($value)) {
            $this->Image = $value;
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
  
 

}
