<?php
 class Admin{
     // database connection and table name
     private $conn;
     private $table_name="admins";

     // object properties
     public $id;
     public $name;
     public $email;
     public $password;
     public $img;

     public function __construct($db){
       $this->conn=$db;
     }
    public function  checkuser($condation,$value)
    {
        $query="
        SELECT id FROM ".$this->table_name." WHERE ".$condation."=?
        ";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $value);
        $stmt->execute();
        $row=$stmt->fetch();
        $count=$stmt->rowcount();
        if($count>0)
        {
            return true;
        }
        else
        {
           return false;
        }
    }

    function create(){
      $query = "INSERT INTO
      " . $this->table_name . "
       SET
      name=:name, username=:username, email=:email, phone=:phone, password=:password, created_at=:created_at";
      $stmt = $this->conn->prepare($query);
       // to get time-stamp for 'created' field
       $this->timestamp = date('Y-m-d H:i:s');
       $this->name=htmlspecialchars(strip_tags($this->name));
       $this->username=htmlspecialchars(strip_tags($this->username));
       $this->email=htmlspecialchars(strip_tags($this->email));
       $this->phone=htmlspecialchars(strip_tags($this->phone));
       $this->password=htmlspecialchars(strip_tags($this->password));
        // bind values 
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":created_at", $this->timestamp);
       if($stmt->execute()){
        $_SESSION['email']=$this->email; // value here is email
            return true;
        }else{
            return false;
        }   
     }
     public function login($condation,$value){
       $query="
       select  password from  ".$this->table_name." where ".$condation."=?
       ";
       $stmt = $this->conn->prepare($query);
       $stmt->bindParam(1, $value);
       $stmt->execute();
       $row=$stmt->fetch();
       $count=$stmt->rowcount();  
        if($count>0)
        {
            if (password_verify($this->password, $row['password'])) {
              $_SESSION['admin_email']=$value; // value here is email
              return true;
              } else {
                return false;     
              }
        }
          else
          {
            return false;     
          }
      }   
 

     // used by select drop-down list
    function read(){
      //select all data
      $query = "SELECT
                  id, name
              FROM
                  " . $this->table_name . "
              ORDER BY
                  name";  

      $stmt = $this->conn->prepare( $query );
      $stmt->execute();
      return $stmt;
  }
     // used to read category name by its ID
function readName(){
      
  $query = "SELECT name FROM " . $this->table_name . " WHERE id = :id limit 0,1";
  $stmt = $this->conn->prepare( $query );
  $stmt->bindParam(':id',$this->id);
  $stmt->execute();

  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $this->name = $row['name'];
}
 }
?>