<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>
<?php
    include 'index.php';
?>

<?php 
    include "data_access_helper.php";
    include "TableRows_extends_RecursiveIteratorIterator.php";

    $data = new  DataAccessHelper();
    $data->show();
    $data->connect_sqli_oo();echo "<br>";
    $data->close_mysqli_oo();
    $data->connect_sqli_proc();echo "<br>";
    $data->close_mysqli_proc();
    $data->connect_pdo();echo "<br>";
    $data->close_pdo();
    echo "<br>----Test Accomplised----<br>";
    
    $sql = "SELECT id, firstname, lastname FROM guest;";
    //Object-Oriented
    echo "<br><br>****Using Object Oriented****<br><br>";
    $data->connect_sqli_oo();
    echo "<br>----Connection Accomplised----<br>";
    $result = $data->executeQuery_mysqli_oo($sql);
    
    echo "<br>----Query Excuted----<br>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]."<br>";
        }
    } else {
        echo "0 results";
    }
    echo "----Get Data Accomplised----";
    echo "<br>";
    $data->close_mysqli_oo();
    echo "----Closed----";
    //Procedural
    echo "<br><br>****Using Produceral****<br><br>";
    $data->connect_sqli_proc();
    echo "<br>----Connection Accomplised----<br>";
    $result = $data->executeQuery_mysqli_proc($sql);
    echo "<br>----Query Excuted----<br>";
    if (mysqli_num_rows($result) > 0) {
        echo "<table><tr><th>ID</th><th>Name</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    echo "----Get Data Accomplised----";
    echo "<br>";
    $data->close_mysqli_proc();
    echo "----Closed----";
    //PDO
    echo "<br><br>****Using PDO****<br><br>";
    $data->connect_pdo();
    echo "<br>----Connection Accomplised----<br>";
    $conn = $data->get_conn_pdo();
    $sth = $conn->prepare($sql);
    $sth->execute();
    $result = $sth->setFetchMode(PDO::FETCH_ASSOC);
    echo "<br>----Query Excuted----<br>";
    echo "<table style='border: solid 1px black;'><tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";
    foreach(new TableRows(new RecursiveArrayIterator($sth->fetchAll())) as $k=>$v) { 
        echo $v;
    }
    echo "</table>";
    echo "----Get Data Accomplised----";
    $data->close_pdo();
    echo "----Closed----";
?>

</body></html>

