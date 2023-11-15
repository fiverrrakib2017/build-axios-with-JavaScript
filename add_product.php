<?php

$conn = new mysqli("localhost", "root", "", "test");


if (isset($_POST['product_name'])) {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $productName = $_POST['product_name'];
        $productImage = $_POST['product_image'];
        $productPrice = $_POST['product_price'];
    
        // Perform the insertion query
        $insertQuery = "INSERT INTO service_product (product_name, product_image, price) VALUES ('$productName', '$productImage', '$productPrice')";
    
        if ($conn->query($insertQuery) === TRUE) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
    
    


}





?>