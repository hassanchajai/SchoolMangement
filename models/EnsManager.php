<?php
class EnsManager extends Model
{
    public function getAllEns()
    {
        return $this->getAll("enseignants", "Ens");
    }
    public function getOneEns($id)
    {
        return $this->getOne("enseignants", "Ens", $id);
    }


    public function create($id)
    {
        extract($_POST);
        // print_r($_POST);
        try {
            $conn = $this->getbdd();
            $stmt = $conn->prepare("INSERT INTO `enseignants` (`nom`, `prenom`, `idUser`, `idMatiere`, `idgroup`) VALUES (?,?,?,?,?)");
            $stmt->bindParam(1, $nom, PDO::PARAM_STR);
            $stmt->bindParam(2, $prenom, PDO::PARAM_STR);
            $stmt->bindParam(3, $id, PDO::PARAM_INT);
            $stmt->bindParam(4, $idmatiere, PDO::PARAM_INT);
            $stmt->bindParam(5, $idgroup, PDO::PARAM_INT);
            $stmt->execute();
            $this->close();
        } catch (PDOException $e) {
            echo "message :" . $e->getMessage();
            die();
        }
    }
    public function update()
    {
        extract($_POST);
        try {
            $conn = $this->getbdd();
            $stmt = $conn->prepare("UPDATE `enseignants` SET `nom`=?, `prenom`=?, `idMatiere`=?, `idgroup`=? WHERE idEns=?");
            $stmt->bindParam(1, $nom, PDO::PARAM_STR);
            $stmt->bindParam(2, $prenom, PDO::PARAM_STR);
            $stmt->bindParam(3, $idmatiere, PDO::PARAM_INT);
            $stmt->bindParam(4, $idgroup, PDO::PARAM_INT);
            $stmt->bindParam(5, $id, PDO::PARAM_INT);
            $stmt->execute();
            $this->close();
        } catch (PDOException $e) {
            echo "message :" . $e->getMessage();
            die();
        }
    }
    public function Delete($id)
    {
        $conn = $this->getbdd();
        $stmt = $conn->prepare("DELETE FROM `enseignants` WHERE idens=?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $this->close();
    }
}
