<?php
    include 'index.php';
?>
<?php
    //create connection to database using mysqli
    $conn = new mysqli("localhost:3306", "msaio", "123zxc", "test"); 
    //check connection
    if ($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);	
    }else{
        echo "Connected successfully";
    }
    //query
    // $sql= "select * from guest;";
    $sql = "insert into guest (firstname, lastname, email) values ('hello world', 'i love u', 'chichchich@email.com');";

    // $last_id = $conn->query($sql);
    echo "<br>";
    //check the querry
    if($conn->query($sql)){
        echo "inserted successfully and last id is: ". $conn->insert_id;
    }
    else{
        echo "failed : ". $conn->error;
    }

    //close connection
    $conn->close();
?>