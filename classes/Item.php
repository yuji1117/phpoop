<?php

require_once "Config.php";

class Item extends Config{

    public function selectAll(){
        //query
        $sql = "SELECT * FROM items INNER JOIN categories ON items.category_id=categories.category_id";
        
        //execute or run the query
        $result = $this->conn->query($sql);
        $rows = array();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }else{
            return false;
        }
    }

    public function selectOne($id){
        //query
        $sql = "SELECT * FROM items WHERE item_id=$id";
        
        //execute or run the query
        $result = $this->conn->query($sql);
        if($result){
            return $result->fetch_assoc();
        }elseif($this->conn->error){
            echo"Error:" .$this->conn->error;
        }
    }


    public function save($item_name,$category,$item_description,$item_price){

        $sql = "INSERT INTO items(category_id,item_name,item_description,item_price)
        VALUES('$category','$item_name','$item_description','$item_price')";
        //execute or run the query
        $result = $this->conn->query($sql);

        if($result){
            return true;

        }else{
            echo "Error:" . $this->conn->error;
        }
    }
    public function update($id,$category_id,$item_name,$item_description,$item_price){
        $sql = "UPDATE items SET category_id=$category_id, item_name='$item_name', item_description='$item_description', item_price=$item_price
        WHERE item_id=$id";
        //sescute or run query
        $result = $this->conn->query($sql);
        if($result){
            return true;
        }else{
            echo"Error:" . $this->conn->error;
        }
    }

    public function delete($id){
        $sql = "DELETE FROM items WHERE item_id=$id";
        //execute or run the query
        $result = $this->conn->query($sql);

        if($result){
            return true;
        }else{
            echo "Error:" . $this->conn->error;
        }
    }
}



?>