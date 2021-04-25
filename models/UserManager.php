<?php 
class UserManager extends Model{
    

    public function getallusers(){
        return $this->getAll("users","User");
    }
    public function getsingleuser($id){
        return $this->getOne("users","User",$id);
    }
    public function createone(){
        //  TODO not completed yet 
        extract($_POST);
        $conn = $this->getbdd();
        $stmt = $conn->prepare("INSERT INTO `users` () VALUES (?,?,?,?)");
        $stmt->bindParam(1,$email);


    }
      //  signIn Functions
      protected function uidExist(string $Email=""){
        if(!empty($Email)){
          
                $sql="SELECT * FROM `users` WHERE email=? OR uid=?";
                $conn=$this->getbdd();
                $result = $conn->prepare($sql);
                $result->bindParam(1, $Email, PDO::PARAM_STR);
                $result->bindParam(2, $Email, PDO::PARAM_STR);
                $result->execute();
                // $result->fetch(PDO::FETCH_ASSOC);
                return $result;          
        }
      
    }
    public function signin($email,$pwd){
        $uidExist=$this->uidExist($email);
        
        if($uidExist->rowCount()==0){
            return false;
        }
        $user=$uidExist->fetch(PDO::FETCH_ASSOC);
        $pwdHashed=$user["pwd"];
        if($pwd===$pwdHashed){
            session_start();
            $_SESSION["user_id"]=$user["id"];
            $_SESSION["user_name"]=$user["uid"];
            return true;
        }else{
          return false;   
        }
       
      
    }
    public function signout(){
        
        session_unset();
        session_destroy();
    }
}