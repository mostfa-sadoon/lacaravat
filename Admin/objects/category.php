<?php
 class Category{
     // database connection and table name
     private $conn;
     private $table_name="categories";

     // object properties
     public $id;
     public $name;

     public function __construct($db){
       $this->conn=$db;
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

  public function create()
  {
    $query = "INSERT INTO
      " . $this->table_name . "
       SET
       name=:name , created_at=:created_at";
      $stmt = $this->conn->prepare($query);
       // to get time-stamp for 'created' field
       $this->name=htmlspecialchars(strip_tags($this->name));
       $this->timestamp = date('Y-m-d H:i:s');
        // bind values 
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":created_at", $this->timestamp);
       if($stmt->execute()){
            return true;
        }else{
            return false;
        }   
   }

public function Update()
{
  $query="
            UPDATE " . $this->table_name . " SET name=:name where id=:id";
            $stmt=$this->conn->prepare($query);
            $this->name=htmlspecialchars(strip_tags($this->name));
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':id', $this->id);
            if($stmt->execute()){
              return true;
          }else{
              return false;
          }   
}   

public function destroy()
{
    $query = "DELETE FROM ".$this->table_name." WHERE id=".$this->id."";
    $stmt = $this->conn->prepare($query);
    if($stmt->execute()){
    return true;
    }else{
        return false;
    }   
}
   
// used to read category name by its ID
function readName(){
      
  $query = "SELECT name ,id FROM " . $this->table_name . " WHERE id = :id limit 0,1";
  $stmt = $this->conn->prepare( $query );
  $stmt->bindParam(':id',$this->id);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $this->name = $row['name'];
  $this->id = $row['id'];
}


 }
?>