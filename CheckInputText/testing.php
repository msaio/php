<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        
        This is method [post]: <input type="text" name="fname">
        <input type="submit" value="ClickMe">
        <?php
            $str = $_POST["fname"];
            echo "<hr>only contains numbers or letters ?<hr>";
            if ( preg_match("/^[0-9A-Za-z ]*$/", $str) ){
                echo "<h1>y</h1>";
            }else {
                echo "<h1>n</h1>";
            }
        ?>
    </form> 
    
</body>
</html>