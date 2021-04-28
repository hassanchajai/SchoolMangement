<?php
class Ens
{
    private $id;
    private $nom;
    private $prenom;
    private $iduser;
    private $idmatiere;
    private $matiere;
    private $idgroup;
    private $group;

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
     public function setIdEns($value)
    {
        if (!empty($value)) {
            $this->id = $value;
        }
    }
    public function setNom($value)
    {
        if (!empty($value)) {
            $this->nom = $value;
        }
    }
    public function setPrenom($value)
    {
        if (!empty($value)) {
            $this->prenom = $value;
        }
    }
  
    public function setIdUser($value)
    {
        if (!empty($value)) {
            $this->iduser = $value;
        }
    }
    public function setIdMatiere($value)
    {
        if (!empty($value)) {
            $this->idmatiere = $value;
        }
    }
    public function setMatiere($value)
    {
        if (!empty($value)) {
            $this->matiere = $value;
        }
    }
    public function setIdgroup($value)
    {
        if (!empty($value)) {
            $this->idgroup = $value;
        }
    }
    public function setgroup($value)
    {
        if (!empty($value)) {
            $this->group = $value;
        }
    }
    public function getId()
    {
        return $this->id;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getGroup()
    {
        return $this->group;
    }
    public function getIdGroup()
    {
        return $this->idgroup;
    }
    public function getMatiere()
    {
        return $this->matiere;
    }
    public function getIdMatiere()
    {
        return $this->idmatiere;
    }
    public function getIdUser()
    {
        return $this->iduser;
    }
}
