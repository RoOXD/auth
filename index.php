<?php

$secret="14011999";	
$value=$_COOKIE["UserCookie"];
$parts = explode(".", $value);
$id = $parts[0];
$hash = $parts[1];

$val1=hash_hmac('md5',$id, $secret);

if (hash_equals($val1,$hash)){
	echo "Sunteti logat ca $id.";
?>
<html>	
	<form action="logout.php">
    	<input type="submit" value="Logout" />
	</form>
</html>
<?php
}else {
	echo "Date eronate";
	setcookie("UserCookie", null, -1, '/');
}
?>
