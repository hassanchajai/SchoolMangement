<?php

abstract class Model
{
    private static  $_bdd;
    private static function setBdd()
    {
        self::$_bdd = new PDO("mysql:host=localhost;dbname=schoolmanagement", "hassan", "hassan1234");
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // self::$_bdd->lastInsertId();
    }
    protected function close(){
        self::$_bdd=null;
    }
    protected function getbdd()
    {
        if (self::$_bdd == null) {
            $this->setBdd();
            return self::$_bdd;
        }
    }
    protected function getAll($table, $obj)
    {
        $this->getbdd();
        $var = [];
        $sql = "SELECT * FROM $table ORDER BY id DESC";
        if ($obj == "Ens") $sql = "SELECT `idEns`,u.uid,`nom`,`prenom`,`idUser`,`idMatiere`,`idgroup`,m.libelle as matiere,g.libelle as `group` 
         FROM `enseignants` as e 
         JOIN users as u ON u.id= e.idUser 
         JOIN matiere as m on m.id=e.idmatiere 
         JOIN groups as g on g.id=e.idgroup";
        $req = self::$_bdd->prepare($sql);
        $req->execute();
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new $obj($row);
        }
        $req->closeCursor();
        return $var;
    }
    
    protected function getOne($table, $obj, $id)
    {
        $this->getbdd();
        $sql = "SELECT * FROM $table WHERE ID = ?";
        if ($obj == "Ens") $sql = "SELECT `idEns`,`nom`,`prenom`,`idUser`,`idMatiere`,`idgroup`,m.libelle as matiere,g.libelle as `group`
        FROM `enseignants` as e 
        JOIN users as u ON u.id= e.idUser 
        JOIN matiere as m on m.id=e.idmatiere 
        JOIN groups as g on g.id=e.idgroup WHERE idEns=?";
        $req = self::$_bdd->prepare($sql);
        $req->bindParam(1, $id, PDO::PARAM_INT);
        $req->execute();
        $var = [];
        // print_r($req->fetchAll(PDO::FETCH_ASSOC));
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $var = new $obj($row);
        }
       
        return $var;
    }
   
}
