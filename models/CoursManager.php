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
    public function insert($horraire,$dt,$idens,$idsalle){
        
        try {
            $conn = $this->getbdd();
            $stmt = $conn->prepare("INSERT INTO `cours`( `horraire`, `dt`, `idEns`, `idsalle`) VALUES (?,?,?,?)");
            $stmt->bindParam(1, $horraire, PDO::PARAM_STR);
            $stmt->bindParam(2, $dt, PDO::PARAM_STR);
            $stmt->bindParam(3, $idens, PDO::PARAM_INT);
            $stmt->bindParam(4, $idsalle, PDO::PARAM_INT);
            $stmt->execute();
            $this->close();
        } catch (PDOException $e) {
            echo "message :" . $e->getMessage();
            die();
        }
    }
    public function delete($id){
        try {
            $conn = $this->getbdd();
            $stmt = $conn->prepare("DELETE FROM `cours` WHERE id=?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
            $this->close();
        } catch (PDOException $e) {
            echo "message :" . $e->getMessage();
            die();
        }
    }

}