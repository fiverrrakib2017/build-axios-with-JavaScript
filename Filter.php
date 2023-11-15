<?php

$conn = new mysqli("localhost", "root", "", "test");
if (isset($_GET['get-data-table'])=='active') {
    $product_name=isset($_GET['product_name'])?$_GET['product_name']:'';
    //create and empty array 
    $data=[];
    if ($all_data=$con->query("SELECT * FROM service_product WHERE product_name='$product_name'")) {
        while ($rows=$all_data->fetch_assoc()) {
            $data[]=$rows;
        }
        echo json_encode(array('data' => $data));
    }
}





?>