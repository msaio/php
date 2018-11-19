
<?php
    include 'index.php';
    $servername = "localhost:3306";
    $username = "useri";
    $password = "123zxc";
    
    // Create connection opt 1:
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    echo "Connected successfully";

    $conn->close();

    // Create connection opt 2:
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "<br>Connected successfully";

    echo "<br>";

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