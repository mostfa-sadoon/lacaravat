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
     // ,city=:city, status=:status, phone1=:phone1,customer_name=:customer_name,total_price=:total_price,total_unit=:total_unit,phone2=:phone2, kind=:kind,
      function create(){
        $query = "INSERT INTO
        " . $this->table_name . "
         SET
        user_id=:user_id,orderaddress=:orderaddress,city=:city,phone1=:phone1,total_price=:total_price,total_unit=:total_unit,customer_name=:customer_name,kind=:kind,phone2=:phone2,status=:status,created_at=:created_at";
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
          $this->customer_name=htmlspecialchars(strip_tags($this->customer_name));
          $this->total_unit=htmlspecialchars(strip_tags($this->total_unit));
          $this->total_price=htmlspecialchars(strip_tags($this->total_price));
          // bind values 
          $stmt->bindParam(":user_id", $this->user_id);
          $stmt->bindParam(":orderaddress", $this->orderaddress);
          $stmt->bindParam(":status", $this->status);
          $stmt->bindParam(":phone1", $this->phone1);
          $stmt->bindParam(":phone2", $this->phone2);
          $stmt->bindParam(":kind", $this->kind);
          $stmt->bindParam(":city", $this->city);
          $stmt->bindParam(":customer_name", $this->customer_name);
          $stmt->bindParam(":total_unit", $this->total_unit);
          $stmt->bindParam(":total_price", $this->total_price);
          $stmt->bindParam(":created_at", $this->timestamp);
         if($stmt->execute()){
            $this->last_id = $this->conn->lastInsertId();
            return true;
          }else{
            if( !empty($databaseErrors) ){  
              $errorInfo = print_r($databaseErrors, true); 
              $errorLogMsg = "error info: $errorInfo"; 
          }
            print_r($stmt->errorInfo());

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
                    where user_id=".$this->user_id." and id=".$this->id."
                ORDER BY
                    id";  
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $order=$stmt->fetch();
        return $order;
      }
       // inner join relation
        function orderproduct()
        {
          $query="select*
          from ".$this->table_name."  o
          inner join orderproducts  d
          on 
          o.id=d.order_id
          where 
          order_id=".$this->id."
          ";
          $stmt = $this->conn->prepare( $query );
          $stmt->bindParam(':id',$this->id);
          if($stmt->execute())
          {
            $rows=$stmt->fetchall();
            return $rows;
          }else{
            die(print_r($stmt->errorInfo()));
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