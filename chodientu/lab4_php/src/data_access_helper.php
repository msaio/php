 <?php
 class DataAccessHelper {
 	private $conn;

 	public function connect(){
 		$servername = "localhost:3306";
 		$username = "useri";
 		$password = "123zxc";
 		$dbname = "chodientu";

 		// Create connection
 		$GLOBALS['conn'] = new mysqli($servername, $username, $password, $dbname);

		// Check connection
 		if ($GLOBALS['conn']->connect_error) {
 			die("Connection failed: " . $conn->connect_error);
 		}
 		echo "Connected successfully";
 	}

 	public function executeNonQuery($sql){
 		if ($GLOBALS['conn']->query($sql) === TRUE) {
 			echo "Your query has been executed successfully";
 		} else {
			 echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
			 $GLOBALS['conn']->query($sql);
 		}
 	}
	
 	public function executeQuery($sql){
 		$result = $GLOBALS['conn']->query($sql);
 		return $result;
 	}

 	public function close(){
 		mysqli_close($GLOBALS['conn']);
 	}
 }

 ?> 