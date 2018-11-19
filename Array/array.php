<?php
    $cars = array(
        array("Hentai", 20, 10),
        array("Cyka", 30, 500),
        array("Mommy", 10,10),
        array("Papa", 100, 200)
    );
    echo "name: ".$cars[0][0]." has: ".$cars[0][1]." has: ".$cars[0][2]."<br>";
    echo "name: ".$cars[1][0]." has: ".$cars[1][1]." has: ".$cars[1][2]."<br>";
    echo "name: ".$cars[2][0]." has: ".$cars[2][1]." has: ".$cars[2][2]."<br>";
    echo "name: ".$cars[3][0]." has: ".$cars[3][1]." has: ".$cars[3][2]."<br>";
   

    for ($i = 0; $i < 4; $i++) {
        echo "name: ";
        for ($j = 0 ; $j < 3; $j++){
            if($j == 2) echo $cars[$i][$j];
            else echo $cars[$i][$j]." has: ";
        }
        echo "<br>";
    }
?>