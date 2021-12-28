<?php
 class Order {
     // database connection and table name
     private $conn;
     private $table_name="orders";
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
     public $customer_name;
     public $total_unit;
     public $total_price;
     public $last_id;

     public function __construct($db){
       $this->conn=$db;
     }
     public function orders($from_record_num, $records_per_page)
     {
        $query = "SELECT*
        FROM
        " . $this->table_name . " 
            ";
            $stmt = $this->conn->prepare( $query );
        if($stmt->execute())
        {
            return $stmt;
        }else{
            print_r($stmt->errorInfo());
            return false;
        }
        return $stmt;
     }
      public function countall()
      {
          $query="
          select id
          FROM
          " . $this->table_name . "

          ";
          $stmt = $this->conn->prepare( $query );
          $stmt->execute();
          $count=$stmt->rowcount();
          return $count;
      }
      public function countwaiting()
      {
          $query="
          select id
          FROM
          " . $this->table_name . "
          where kind = 'cash' and status = 'false'
          ";
          $stmt = $this->conn->prepare( $query );
          $stmt->execute();
          $count=$stmt->rowcount();
          return $count;
      }


    // used by select drop-down list
    function read(){
      //select all data
      $query = "SELECT
                  *
              FROM
                  " . $this->table_name . "
                  where id=".$this->id."
              ORDER BY
                  id";  
      $stmt = $this->conn->prepare( $query );
      if($stmt->execute())
       {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $row['id'];
        $this->user_id = $row['user_id'];
        $this->status = $row['status'];
        $this->created_at = $row['created_at'];
        $this->phone1 = $row['phone1'];
        $this->phone2 = $row['phone2'];
        $this->kind = $row['kind'];
        $this->city = $row['city'];
        $this->customer_name = $row['customer_name'];
        $this->total_unit = $row['total_unit'];
        $this->total_price = $row['total_price'];
         return true;
       }else{
         return false;
       }
     
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