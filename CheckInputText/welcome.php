<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>welcome</title>
</head>
<body>
    <?php
        if($_GET["fname"] != ""){
            $x =  $_GET["fname"];
            trim($x);
            echo "\$_GET is:".$x."<br>";
        }else{
            echo "\$_GET is empty!"."<br>";
        }
    ?>
    <?php
        if($_POST["fname"] != ""){
            trim($_POST["fname"]);
            echo "\$_POST is: ".$_POST["fname"]."<br>";
        }else{
            echo "\$_POST is empty!"."<br>";
        }

        echo stripslashes("Who\'s Peter Griffin?");
        echo "Who\'s Peter Griffin?";
    ?>
    <br><a href="form.php">To form</a>
</body>
</html>