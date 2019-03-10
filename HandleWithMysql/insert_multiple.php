<?php
    include 'index.php';
?>
<?php
    //connect to database using mysqli
    $connection = new mysqli("localhost:3306", "msaio", "123zxc", "test");
    //check connection
    if($connection->connect_error){
        die("connection unsuccessfull". $connection->connect_error);
    }else{
        echo "connected"."<br>"."<br>";
    }
    //query
    $sql = "";
    $sql .= "insert into guest(firstname, lastname, email) values('Hi1', 'Hello1', 'Chao@email.com1');";
    $sql .= "insert into guest(firstname, lastname, email) values('Hi2', 'Hello2', 'Chao@email.com2');";
    // $sql .= "insert into guest(firstname, lastname, email) values('Hi3', 'Hello3', 'Chao@email.com3');";

    echo $sql."<br>";
    if($connection->multi_query($sql)){
        echo "Succecsfully Insert Into Database";
    }else{
        echo "Got Error in :"."<br>".$sql."<br>".$connection->error;
    }
    //close connection
    echo "<br><br>";
    if($connection->close()){
        echo "Connection Closed";
    }else{
        echo "Connection Still Open";
    }
    
?>