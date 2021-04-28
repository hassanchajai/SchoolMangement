<?php 
class EnsManager extends Model{
    public function getAllEns(){
        return $this->getAll("enseignants","Ens");
    }
    public function getOneEns($id){
        return $this->getOne("groups","Group",$id);
    }
    public function create(){
        extract($_POST);
        $conn = $this->getbdd();
        $stmt=$conn->prepare("INSERT INTO `groups`( `libelle`, `effectif`) VALUES (?,?)");
        $stmt->bindParam(1,$libelle,PDO::PARAM_STR);
        $stmt->bindParam(2,$effectif,PDO::PARAM_STR);
        $stmt->execute();
       
    }
    public function update(){
        extract($_POST);
        $conn = $this->getbdd();
        $stmt=$conn->prepare("UPDATE `groups` SET `libelle`=?, `effectif`=? WHERE id=?");
        $stmt->bindParam(1,$libelle,PDO::PARAM_STR);
        $stmt->bindParam(2,$effectif,PDO::PARAM_STR);
        $stmt->bindParam(3,$id,PDO::PARAM_INT);
        $stmt->execute();
       
    }
    public function Delete($id){
        $conn=$this->getbdd();
        $stmt=$conn->prepare("DELETE FROM `groups` WHERE id=?");
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute();
        
       
    }

}