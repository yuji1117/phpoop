<?php
require_once "classes/Config.php";

class Category extends Config{

    public function selectAll(){
        //query
        $sql = "SELECT * FROM categories";
        
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
        $sql = "SELECT * FROM categories WHERE category_id=$id";
        
        //execute or run the query
        $result = $this->conn->query($sql);
        if($result){
            return $result->fetch_assoc();
        }elseif($this->conn->error){
            echo"Error:" .$this->conn->error;
        }
    }

//categorynameに変える？}
    public function save($category_name){

        $new_password = md5($password);
        $sql = "INSERT INTO categories(category_name)
        VALUES('$category_name')";
        //execute or run the query
        $result = $this->conn->query($sql);

        if($result){
            return true;

        }else{
            echo "Error:" . $this->conn->error;
        }
    }
    public function update($id,$category_name){
        $sql = "UPDATE categories SET category_name='$category_name' WHERE category_id=$id";
        //sescute or run query
        $result = $this->conn->query($sql);
        if($result){
            return true;
        }else{
            echo"Error:" . $this->conn->error;
        }
    }

    public function delete($id){
        $sql = "DELETE FROM categories WHERE category_id=$id";
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