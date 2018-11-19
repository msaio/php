<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form</title>
</head>
<body>
    <form action="welcome.php" method="get">
        This is method [get]: <input type="text" name="fname">
        <input type="submit" value="ClickMe">
    </form>
    <br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        This is method [post]: <input type="text" name="fname">
        <input type="submit" value="ClickMe">
    </form> 
    <?php
        $str = $_POST["fname"];
        if ($str == trim($str) && strpos($str, ' ') !== false) {
            echo 'has spaces, but not at beginning or end';
        }else{
            echo "has spaces at end or beginning";
        }
        
        if ( preg_match("/^[a-zA-Z ]*$/", $str) ){
            echo "<br>contains no pattern no number, only spaces and letters";
        }else if( !preg_match("/^[a-zA-Z ]*$/", $str) ){
            echo "<br>has numbers or patterns";
        }
    ?>
</body>
</html>