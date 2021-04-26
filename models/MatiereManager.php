<?php

class MatiereManager extends Model{
    public function getAllGMatiere(){
        return $this->getAll("matiere","Matiere");
    }
    public function getOneMatiere($id){
        return $this->getOne("matiere","Matiere",$id);
    }
    public function createMatiere(){
        extract($_POST);
        $conn = $this->getbdd();
        $stmt=$conn->prepare("INSERT INTO `matiere`( `libelle`) VALUES (?)");
        $stmt->bindParam(1,$libelle,PDO::PARAM_STR);
        $stmt->execute();
       
    }
    public function updateMatiere(){
        extract($_POST);
        $conn = $this->getbdd();
        $stmt=$conn->prepare("UPDATE `matiere` SET `libelle`=? WHERE id=?");
        $stmt->bindParam(1,$libelle,PDO::PARAM_STR);     
        $stmt->bindParam(2,$id,PDO::PARAM_INT);
        $stmt->execute();
       
    }
    public function DeleteMatiere($id){
        $conn=$this->getbdd();
        $stmt=$conn->prepare("DELETE FROM `matiere` WHERE id=?");
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute();
        
       
    }
}
