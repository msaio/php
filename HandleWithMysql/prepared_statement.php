<?php
    include 'index.php';
?>
<?php 

   include "data_access_helper.php";

   $data = new  DataAccessHelper();
   $data->show();
   $data->connect_sqli_oo();echo "<br>";
   $data->close_mysqli_oo();
   $data->connect_sqli_proc();echo "<br>";
   $data->close_mysqli_proc();
   $data->connect_pdo();echo "<br>";
   $data->close_pdo();
   echo "<br>----Test Accomplised----<br>";
   $data->connect_sqli_oo();

   // $sql = "CREATE TABLE guest (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
   //                            firstname VARCHAR(30) NOT NULL, 
   //                            lastname VARCHAR(30) NOT NULL, 
   //                            email VARCHAR(50), reg_date TIMESTAMP);";
   // $data->executeNonQuery_mysqli_oo($sql);
   // $sql = "drop table guest;";
   // $data->executeNonQuery_mysqli_oo($sql);

   $stmt = $GLOBALS['conn']->prepare("insert into guest(firstname, lastname, email) values(?,?,?)");
   $stmt->bind_param("sss", $firstname, $lastname, $email);

   $firstname = "John"; $lastname = "Kenedy"; $email = "msaio@gmail.com";
   $stmt->execute();
   
   $firstname = "Ohio"; $lastname = "Conor"; $email = "msaio@gmail.com";
   $stmt->execute();

   $firstname = "Nim"; $lastname = "Dolce"; $email = "msaio@gmail.com";
   $stmt->execute();
?>