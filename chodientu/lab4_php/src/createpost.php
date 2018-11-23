<?php 
    require 'data_access_helper.php';
    $product_name = $_GET["product_name"];
    $price = $_GET["price"];
    $category = $_GET["category"];
    $imagelink = $_GET["image_link"];

    echo $product_name;
    echo $price;
    echo $category;
    echo $imagelink;

    $db = new DataAccessHelper ;
    $db->connect();
    // $db->executeNonQuery("CREATE TABLE sale_order(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //                     ship_name VARCHAR(30) NOT NULL,
    //                     ship_phone VARCHAR(15) NOT NULL,
    //                     ship_address VARCHAR(50),
    //                     reg_date TIMESTAMP)");
    $db->executeNonQuery("INSERT INTO product(ProductName, Price, Category, ImageUrl) 
                        VALUES ('$product_name', '$price', '$category', '$imagelink')");
    $db->close();
    echo "Inserted 1 record to db";
    
?>
