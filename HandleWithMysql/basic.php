
<?php
    include 'index.php';
    $dms = "mysql";
    $servername = "localhost:3306";
    $username = "msaio";
    $password = "123zxc";
    $dbname = "test";

    // Create connection opt 1:
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        echo "<br>Connected successfully";
    }
    $conn->close();

    // Create connection opt 2:
    try {
        $conn = new PDO("$dms:host=$servername;",$username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully"; 
    }   
    catch (PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
    // Create connection opt 3:
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        echo "<br>Connected successfully";
    }
    echo "<br>";
    // mysqli_close($conn);
        

    // Create database
    $sql = "CREATE DATABASE test;";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    echo "<br>";
    // Drop database test
    if(mysqli_query($conn, "DROP DATABASE test;")){
        echo "Drop test successfully";
    } else{
        echo mysqli_error($conn);
    }

    echo "<br>";
    // Recreate database
    $sql = "CREATE DATABASE test;";
    if (mysqli_query($conn, $sql)) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . mysqli_error($conn);
    }

    echo "<br>";
    //Close database;
    if(mysqli_close($conn)){
        echo "Database closed successfully";
    }else{
        echo $conn->connection_status;
    }


    
?>