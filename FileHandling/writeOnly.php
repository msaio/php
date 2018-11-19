<?php 
	$file = fopen("writeonly.txt", "w");
	fwrite($file, $_POST["comment"]);
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
	<textarea name="comment" rows="5" cols="40" placeholder="Enter Something" ></textarea>
	<input type="submit" value="Submit">
</form>
