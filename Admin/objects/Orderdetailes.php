<?php
class  Orderdetailes{
    // database connection and table name
    private $conn;
    private $table_name="orderproducts";
    // object properties
    public $id;
    public $order_id;
    public $product_id;
    public $price;
    public $quantity;
    public $total_price;
    public $last_id;
    public $delivery_man;
    public $delivery_number;
    public function __construct($db){
      $this->conn=$db;
    }
      public function readorderdetailes()
      {
          $query="SELECT* 
          FROM ".$this->table_name."
         WHERE order_id = :order_id
          ";
          $stmt=$this->conn->prepare($query);
          $stmt->bindParam(':order_id',$this->order_id);
          if($stmt->execute())
          {
            return $stmt;
           }else{
              print_r($stmt->errorInfo());
              return false;
          }
      }

}
?>