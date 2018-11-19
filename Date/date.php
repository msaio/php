<?php 
    echo date("d/m/y")." -> y format"."<br>";
    echo date("d/m/Y")." -> Y format"."<br>";
    echo date("d-m-y")." -> y format"."<br>";
    echo date("d-m-Y")." -> Y format"."<br>";
    echo date("d.m.y")." -> y format"."<br>";
    echo date("d.m.Y")." -> Y format"."<br>";
    echo date("d(')m-y")." -> y format"."<br>";
    echo date("d(')m(')Y")." -> Y format"."<br>";
    echo date("l - d - m - Y")."<br>";
    echo date("h : i : sa")."<br>";

    date_default_timezone_set("America/New_York");
    echo date("h : i : sa - l - d / m / y")."<br>";

    $d = mktime(11, 20 , 30, 2, 28 ,2003);
    echo date("h : i : sa - d / m / Y", $d);
?>