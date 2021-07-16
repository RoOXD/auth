<?php
	$name=$_COOKIE["UserCookie"];
	echo "Sunteti logat ca $name.";
?>
<html>	
	<form action="logout.php">
    	<input type="submit" value="Logout" />
	</form>
</html>

