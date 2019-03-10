<?php
 class DataAccessHelper {
    private $conn;
    private $servername, $username, $password, $dbname, $dms;
    // Constructor of connection
    public function __construct($servername="localhost:3306", $username="msaio", $password="123zxc", $dbname="test", $dms="mysql"){
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->dms = $dms;
    }

    public function get_conn_pdo(){
        $GLOBALS['conn'] = new PDO("$this->dms:host=$this->servername;dbname=$this->dbname",$this->username, $this->password);
        $GLOBALS['conn']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $GLOBALS['conn'];
    }

    public function show(){
        echo $this->servername."<br>";
        echo $this->username."<br>";
        echo $this->password."<br>";
        echo $this->dbname."<br>";
        echo $this->dms."<br>";
    }
    
    ////////////////////////////////////
    // Using Oject-Oriented
 	public function connect_sqli_oo(){
 		// Create connection
 		$GLOBALS['conn'] = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

		// Check connection
 		if ($GLOBALS['conn']->connect_error) {
 			die("Connection failed: " . $conn->connect_error);
 		}
 		echo "Connected successfully";
     }
    // Using Procedural
    public function connect_sqli_proc(){
        // Create connection
        $GLOBALS['conn'] = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

       // Check connection
        if (!$GLOBALS['conn']) {
            die("Connection failed: " . mysqli_connect_error($GLOBALS['conn']));
        }
        echo "Connected successfully";
    }
    // Using PHP Data Objects
    public function connect_pdo(){
        try {
            $GLOBALS['conn'] = new PDO("$this->dms:host=$this->servername;dbname=$this->dbname",$this->username, $this->password);
            // set the PDO error mode to exception
            $GLOBALS['conn']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully"; 
        }   
        catch (PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }
    ////////////////////////////////////
    // Excute Query with O-O
 	public function executeNonQuery_mysqli_oo($sql){
 		if ($GLOBALS['conn']->query($sql) === TRUE) {
 			echo "Your query has been executed successfully";
 		} else {
			 echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
 		}
    }
    // Excute Query with Proc
    public function executeNonQuery_mysqli_proc($sql){
        if (mysqli_query($GLOBALS['conn'], $sql)) {
            echo "Your query has been executed successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($GLOBALS['conn']);
        }
    }
    //*****
    // Excute Query with PDO
    public function executeNonQuery_pdo($sql){
        try {
            //code...
            $GLOBALS['conn'].exec($sql);
            echo "Your query has been executed successfully";
        } catch (PDOException $e) {
            //throw $th;
            echo "Error: " . $sql . "<br>" . $e->getMessage();
        }
    }
    //*****
    ////////////////////////////////////
    // Excute Query and Return with Object-Oriented
 	public function executeQuery_mysqli_oo($sql){
 		$result = $GLOBALS['conn']->query($sql);
 		return $result;
    }
    // Excute Query and Return with Procedural
    public function executeQuery_mysqli_proc($sql){
        $result = mysqli_query($GLOBALS['conn'], $sql);
        return $result;
    }
    //*****
    //This need to recorrect
    // Excute Query and Return with PHP Data Objects
    public function executeQuery_pdo($sql){
        try{
            $result = $GLOBALS['conn']->exec($sql);
            return $result;
        }catch(PDOException $e){
            echo  "Error: " . $sql . "<br>" . $e->getMessage();
        }    
    }
    //*****
    ////////////////////////////////////
    // Close connection with Mysqli Object-Oriented
    public function close_mysqli_oo(){
        $GLOBALS['conn']->close();
    }
    // Close connection with Mysqli Procedural
 	public function close_mysqli_proc(){
 		mysqli_close($GLOBALS['conn']);
    }
    // Close connection with PDO
    public function close_pdo(){
        $GLOBALS['conn']=null;
    }
    

    /**
     * Get the value of servername
     */ 
    public function getServername()
    {
        return $this->servername;
    }

    /**
     * Set the value of servername
     *
     * @return  self
     */ 
    public function setServername($servername)
    {
        $this->servername = $servername;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of dbname
     */ 
    public function getDbname()
    {
        return $this->dbname;
    }

    /**
     * Set the value of dbname
     *
     * @return  self
     */ 
    public function setDbname($dbname)
    {
        $this->dbname = $dbname;

        return $this;
    }

    /**
     * Get the value of dms
     */ 
    public function getDms()
    {
        return $this->dms;
    }

    /**
     * Set the value of dms
     *
     * @return  self
     */ 
    public function setDms($dms)
    {
        $this->dms = $dms;

        return $this;
    }
 }
 ?> 