<?php
class Product{
    
    // database connection and table name
    private $conn;
    private $table_name="products";
    //object properties
    public $id;
    public $price;
    public $name;
    public $img;
    public $desc;
    public $title;
    public $status;
    public $show;
    public $quantity;
    public $description;
    public $cat_id;
    public $timestamp;
    public $k=array();
    public function __construct($db,$test=null){
        $this->conn=$db;
        // this to pass array in function in class
        if(isset($test))
        {
            if (is_array($test)){
                foreach($test as $k=>$v){
                    array_push($this->k, $v);
                }
             }
        }
    }
    //create product
   function create(){
     //write query 
      $query = "INSERT INTO
     " . $this->table_name . "
      SET
     name=:name, price=:price, description=:description, category_id=:category_id, created=:created";
        
      $stmt = $this->conn->prepare($query);

       // posted values
       $this->name=htmlspecialchars(strip_tags($this->name));
       $this->price=htmlspecialchars(strip_tags($this->price));
       $this->description=htmlspecialchars(strip_tags($this->description));
       $this->category_id=htmlspecialchars(strip_tags($this->category_id));
       
       // to get time-stamp for 'created' field
       $this->timestamp = date('Y-m-d H:i:s');

        // bind values 
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":category_id", $this->category_id);
        $stmt->bindParam(":created", $this->timestamp);

       if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    
   }
   //read main product in the home page
    function readmainproduct()
    {
        $query = "SELECT*
        FROM
        ".$this->table_name."
        where shows='main' 
        ";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
    // read all product in products page
    function readAll($from_record_num, $records_per_page)
    {
        $query = "SELECT*
            FROM
                " . $this->table_name . "
            ORDER BY
                name ASC
            LIMIT
                {$from_record_num}, {$records_per_page}";
  
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
    return $stmt;
    }
    // read all by categoty
    function readAllbycategoy($from_record_num, $records_per_page,$cat_id)
    {
        $query = "SELECT*
            FROM
            " . $this->table_name . " 
               where cat_id= ".$cat_id."
            ORDER BY
                name ASC
            LIMIT
                {$from_record_num}, {$records_per_page}
                ";
            $stmt = $this->conn->prepare( $query );
            $stmt->execute();
            $total_rows=$stmt->rowCount();
            // echo $total_rows;
            // $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $stmt;
    }
    // used for paging products
    public function countAll($condation = null,$condation_value = null){
        if($condation !=null)
        {
            $query = "SELECT id FROM " . $this->table_name . " where " .$condation ." = ".$condation_value;
            
        }else{
            $query = "SELECT id FROM " . $this->table_name . "";
        }
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $num = $stmt->rowCount();
        return $num;
    }
        function readOne($condation = null,$condation_value = null){

            if($condation !=null)
            {
                $query="
                SELECT*
                FROM
                {$this->table_name}
                where
                id=?
                AND
                ".$condation ." = ?
                Limit
                0,1
                ";
                $stmt = $this->conn->prepare( $query );
                $stmt->bindParam(1, $this->id);
                $stmt->bindParam(2, $condation_value);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
       
                  $this->name = $row['name'];
                  $this->img = $row['img'];
                  $this->price = $row['price'];
                  $this->desc = $row['desc'];
                  $this->price = $row['price'];
                  $this->cat_id = $row['cat_id'];
            }else{
                $query="
                SELECT*
                FROM
                {$this->table_name}
                where
                id=?
                Limit
                0,1
                ";
                $stmt = $this->conn->prepare( $query );
                $stmt->bindParam(1, $this->id);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  $this->name = $row['name'];
                  $this->img = $row['img'];
                  $this->price = $row['price'];
                  $this->description = $row['description'];
                  $this->price = $row['price'];
                  $this->cat_id = $row['cat_id'];
            }
        }   
        // this function to select img of product in cart beause cart take info of products from sessions
        function customproduct()
        { 
            $in_values = implode(',', $this->k);
            $query="
            SELECT 
            img
            FROM
            {$this->table_name}
            where
            id IN (".$in_values.")
            ";
             $stmt = $this->conn->prepare( $query );
             $stmt->execute();
             $imgs = $stmt->fetchall();   
             return $imgs;
          //  print_r($rows);
        }
        function update(){
            $query="
            UPDATE 
            " . $this->table_name . "
            SET
            name=:name,
            price=:price,
            description = :description,
            category_id  = :category_id
            where
            id=:id
            ";
            $stmt=$this->conn->prepare($query);
            // posted values
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->price=htmlspecialchars(strip_tags($this->price));
            $this->description=htmlspecialchars(strip_tags($this->description));
            $this->category_id=htmlspecialchars(strip_tags($this->category_id));
            $this->id=htmlspecialchars(strip_tags($this->id));

            // bind parameters
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':price', $this->price);
            $stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':category_id', $this->category_id);
            $stmt->bindParam(':id', $this->id);

            // execute the query
            if($stmt->execute()){
                return true;
            }
            return false;
        }
        function delete(){
            $query="
                DELETE from
                ".$this->table_name."
                where id=?
            ";
            $stmt=$this->conn->prepare($query);
            $stmt->execute([$this->id]);
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
     // read products by search term
            public function search($search_term, $from_record_num, $records_per_page){
            
                // select query
                $query = "SELECT
                            c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
                        FROM
                            " . $this->table_name . " p
                            LEFT JOIN
                                categories c
                                    ON p.category_id = c.id
                        WHERE
                            p.name LIKE ? OR p.description LIKE ?
                        ORDER BY
                            p.name ASC
                        LIMIT
                            ?, ?";
            
                // prepare query statement
                $stmt = $this->conn->prepare( $query );
            
                // bind variable values
                $search_term = "%{$search_term}%";
                $stmt->bindParam(1, $search_term);
                $stmt->bindParam(2, $search_term);
                $stmt->bindParam(3, $from_record_num, PDO::PARAM_INT);
                $stmt->bindParam(4, $records_per_page, PDO::PARAM_INT);
            
                // execute query
                $stmt->execute();
            
                // return values from database
                return $stmt;
            }
  
                public function countAll_BySearch($search_term){
                
                    // select query
                    $query = "SELECT
                                COUNT(*) as total_rows
                            FROM
                                " . $this->table_name . " p 
                            WHERE
                                p.name LIKE ? OR p.description LIKE ?";
                
                    // prepare query statement
                    $stmt = $this->conn->prepare( $query );
                
                    // bind variable values
                    $search_term = "%{$search_term}%";
                    $stmt->bindParam(1, $search_term);
                    $stmt->bindParam(2, $search_term);
                
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                    return $row['total_rows'];
                }
                public function check_quantity()
                {
                    $query="
                    SELECT 
                    quantity
                    FROM
                    {$this->table_name}
                    where
                    id=?
                    Limit
                    0,1
                    ";
                    $stmt = $this->conn->prepare( $query );
                    $stmt->bindParam(1, $this->id);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                     $this->quantity = $row['quantity'];
                  }
                  public function update_quantity($quantity)
                  {
                    $query="
                    UPDATE 
                    " . $this->table_name . "
                    SET quantity = quantity - ".$quantity." 
                    where
                    id=:id
                    ";
                    $stmt=$this->conn->prepare($query);
                    // posted values
                    $this->id=htmlspecialchars(strip_tags($this->id));
                    $stmt->bindParam(':id', $this->id);
                    if($stmt->execute()){
                        return true;
                    }
                    else{
                        return false;
                    }
                  }
}
?>