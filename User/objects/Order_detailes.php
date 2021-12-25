<?php
 class Order_detailes{
     // database connection and table name
     private $conn;
     private $table_name="orderproducts";
     // object properties
     public $id;
     public $user_id;
     public $order_id;
     public $price;
     public $quantity;
     public $created_at;
     public function __construct($db){
       $this->conn=$db;
     }
      function create(){
        $query = "INSERT INTO
        " . $this->table_name . "
         SET
        order_id=:order_id,product_id=:product_id,price=:price, quantity=:quantity,created_at=:created_at";
        $stmt = $this->conn->prepare($query);
         // to get time-stamp for 'created' field
         $this->timestamp = date('Y-m-d H:i:s');
         $this->user_id=htmlspecialchars(strip_tags($this->user_id));
         $this->order_id=htmlspecialchars(strip_tags($this->order_id));
         $this->product_id=htmlspecialchars(strip_tags($this->product_id));
         $this->price=htmlspecialchars(strip_tags($this->price));
         $this->quantity=htmlspecialchars(strip_tags($this->quantity));
         $this->created_at=htmlspecialchars(strip_tags($this->created_at));
          // bind values 
        //   $stmt->bindParam(":user_id", $this->user_id);
          $stmt->bindParam(":order_id", $this->order_id);
          $stmt->bindParam(":price", $this->price);
          $stmt->bindParam(":quantity", $this->quantity);
          $stmt->bindParam(":product_id", $this->product_id);
          $stmt->bindParam(":created_at", $this->timestamp);
         if($stmt->execute()){
             echo "zzepy";
              return true;
          }else{
              echo "mo sadoun";
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
              ORDER BY
                  id DESC ";  
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