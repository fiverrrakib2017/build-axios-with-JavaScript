<?php

$conn = new mysqli("localhost", "root", "", "test");


if (isset($_POST['delete_id'])) {

    
        $id=$_POST['delete_id'];
        if ($conn->query("DELETE FROM `service_product` WHERE id='$id' ")) {
            echo 1; 
        }
    
    


}





?>