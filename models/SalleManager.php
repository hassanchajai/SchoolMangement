<?php 

class SalleManager extends Model{
    public function getallsalle(){
        return $this->getAll("salle","Salle");
    }
    public function getSingleSalle($id){
        return $this->getOne("salle","Salle",$id);
    }
    public function createSalle(){
        extract($_POST);
        $conn = $this->getbdd();
        $stmt=$conn->prepare("INSERT INTO `salle`( `libelle`, `capacity`) VALUES (?,?)");
        $stmt->bindParam(1,$libelle,PDO::PARAM_STR);
        $stmt->bindParam(2,$capacity,PDO::PARAM_INT);
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    public function updateSalle(){
        extract($_POST);
        $conn = $this->getbdd();
        $stmt=$conn->prepare("UPDATE `salle` SET `libelle`=?,`capacity`=? WHERE id=?");
        $stmt->bindParam(1,$libelle,PDO::PARAM_STR);
        $stmt->bindParam(2,$capacity,PDO::PARAM_INT);
        $stmt->bindParam(3,$id,PDO::PARAM_INT);
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    public function DeleteSalle($id){
        $conn=$this->getbdd();
        $stmt=$conn->prepare("DELETE FROM `salle` WHERE id=?");
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute();
        
       
    }
}