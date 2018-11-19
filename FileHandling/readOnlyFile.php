<?php
	echo readfile("readonly.txt");
	echo "<br>readfile() will show all content in file and its size";
?>

<br>
<br>

<?php 
	echo "Hello";
	$file = fopen("readonly.txt", "r") or die("None Shit !");
	echo fread($file, filesize("readonly.txt"));
	echo "<br>".filesize("readonly.txt");
	fclose($file);
?>
