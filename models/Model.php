<?php 

abstract class Model{
    private static  $_bdd;
    private static function setBdd(){
        self::$_bdd=new PDO("mysql:host=localhost;dbname=schoolmanagement","hassan","hassan1234");
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    protected function getbdd(){
        if(self::$_bdd == null){
            $this->setBdd();
            return self::$_bdd;
        }
    }
    protected function getAll($table,$obj){
         $this->getbdd();
         $var=[];
         $req=self::$_bdd->prepare('SELECT * FROM '.$table.' ORDER BY id DESC');
         $req->execute();
         while($row=$req->fetch(PDO::FETCH_ASSOC)){
             $var[] =new $obj($row);
         }
         $req->closeCursor();
         return $var;   

    }
    protected function getOne($table,$obj,$id){
        $this->getbdd();
        $req=self::$_bdd->prepare("SELECT * FROM $table WHERE ID = ?");
        $req->bindParam(1,$id,PDO::PARAM_INT);
        $req->execute();
        $var=[];
        while($row=$req->fetch(PDO::FETCH_ASSOC)){
            $var=new $obj($row);
        }
        return $var;
    }
    protected function createOne(){

    }
}
   
