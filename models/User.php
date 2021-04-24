<?php
class User extends Model
{

    private $id;
    private $Email;
    private $Uid;
    private $image;
    private $role;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $method($value);
            }
        }
    }
    public function setImage($value)
    {
        if (!empty($value)) {
            $this->Image = $value;
        }
    }
    public function setEmail($value)
    {
        if (!empty($value)) {
            $this->Email = $value;
        }
    }
    public function setUid($value)
    {
        if (!empty($value)) {
            $this->Uid = $value;
        }
    }
    public function setRole($value)
    {
        if (!empty($value)) {
            $this->Role = $value;
        }
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
