<?php
 class Order {
     // database connection and table name
     private $conn;
     private $table_name="Orders";
     // object properties
     public $id;
     public $user_id;
     public $orderaddress;
     public $status;
     public $created_at;
     public $phone1;
     public $phone2;
     public $kind;
     public $city;
     public $last_id;

     public function __construct($db){
       $this->conn=$db;
     }
      function create(){
        $query = "INSERT INTO
        " . $this->table_name . "
         SET
        user_id=:user_id,city=:city,orderaddress=:orderaddress, status=:status, phone1=:phone1, phone2=:phone2, kind=:kind,created_at=:created_at";
        $stmt = $this->conn->prepare($query);
         // to get time-stamp for 'created' field
         $this->timestamp = date('Y-m-d H:i:s');
         $this->user_id=htmlspecialchars(strip_tags($this->user_id));
         $this->orderaddress=htmlspecialchars(strip_tags($this->orderaddress));
         $this->status=htmlspecialchars(strip_tags($this->status));
         $this->phone1=htmlspecialchars(strip_tags($this->phone1));
         $this->phone2=htmlspecialchars(strip_tags($this->phone2));
         $this->kind=htmlspecialchars(strip_tags($this->kind));
         $this->city=htmlspecialchars(strip_tags($this->city));
          // bind values 
          $stmt->bindParam(":user_id", $this->user_id);
          $stmt->bindParam(":orderaddress", $this->orderaddress);
          $stmt->bindParam(":status", $this->status);
          $stmt->bindParam(":phone1", $this->phone1);
          $stmt->bindParam(":phone2", $this->phone2);
          $stmt->bindParam(":kind", $this->kind);
          $stmt->bindParam(":city", $this->city);
          $stmt->bindParam(":created_at", $this->timestamp);
         if($stmt->execute()){
            $this->last_id = $this->conn->lastInsertId();
            return true;
          }else{
              return false;
          }   
       }
    // used by select drop-down list
    function read(){
      //select all data
      $query = "SELECT
                  *
              FROM
                  " . $this->table_name . "
                  where user_id=".$this->user_id."
              ORDER BY
                  id";  

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