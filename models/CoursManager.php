<?php
class CoursManager extends Model{


    public function getAllCours(){
        return $this->getAll("cours","Cour");
    }
    public function getOneCours($id){
        return $this->getOne("cours","Cour",$id);
    }
    public function getHorrarie($dt,$idSalle){
        $conn=$this->getbdd();
        $var = [];
        $sql = "SELECT horraire FROM cours WHERE dt = ? AND idsalle=?  ORDER BY id DESC";
        $req = $conn->prepare($sql);
        $req->bindParam(1,$dt,PDO::PARAM_STR);
        $req->bindParam(2,$idSalle,PDO::PARAM_INT);
        $req->execute();
        while($row= $req->fetch(PDO::FETCH_ASSOC)){
            $var[]=$row["horraire"];
        }
        $req->closeCursor();
        $this->close();
        return $var;
    }

}