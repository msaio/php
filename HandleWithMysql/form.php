<?php include 'index.php'; ?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
	FIRST NAME: <input type="text" name="firstname" placeholder="your first name"><br>
	LAST NAME: <input type="text" name="lastname" placeholder="your last name"><br>
	EMAIL: <input type="text" name="email" placeholder="your email"><br>
	<input type="submit" value="SUBMIT">
</form>

<?php  
   
    //create connection
    $conn = new mysqli("localhost:3306", "useri", "123zxc", "test");     
    //check connection
    echo "<br>";
    if ($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);	
    }else{
        echo "Connected successfully";
    }
    //check input
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        echo "<br>";
        if ( empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["email"]) ) {
            echo "Invalid input";
        }else{
            //insert to guest
            echo "<br>";
            $sql = "INSERT INTO guest (firstname, lastname, email) VALUES ( " 
                ."'". $_POST["firstname"]
                ."', ". "'".$_POST["lastname"]
                ."', "."'". $_POST["email"]
                . "');" ;
            if($conn->query($sql)){
                echo "Insert successfully";
            }else{
                echo "Invalid" . $conn->error;
            }
        }
    }
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    

    //close database
    $conn->close();
?>