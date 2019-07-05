<?php
    require_once "classes/Item.php";

    //create instance
    $item = new Item;

    if($_GET['action']=='add'){
        $item_name = $_POST['item_name'];
        $category = $_POST['category'];
        $item_description = $_POST['item_description'];
        $item_price = $_POST['item_price'];
        $result = $item->save($item_name,$category,$item_description,$item_price);

        if($result){
            echo"<script>window.location.replace('items.php');</script>";
        }else{
            echo"Error!!";
        }
    }
    elseif($_GET['action']=='update'){
        $item_id = $_POST['item_id'];
        $category_id = $_POST['category_id'];
        $item_name = $_POST['item_name'];
        $item_description = $_POST['item_description'];
        $item_price = $_POST['item_price'];
        $result = $item->update($item_id,$category_id,$item_name,$item_description,$item_price);

        if($result){
            echo"<script>window.location.replace('items.php');</script>";
        }

    }

    elseif($_GET['action']=='delete'){
        $item_id = $_GET['item_id'];
        $result = $item->delete($item_id);
        if($result){
            echo "<script>window.location.replace('items.php');</script>";
        }
    }

?>