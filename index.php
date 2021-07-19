<?php
require 'auth.php';

	
$value=$_COOKIE["UserCookie"];
$parts = explode(".", $value);
$id = $parts[0];
$hash = $parts[1];

$val1=hash_hmac('md5',$id, $key);

if (hash_equals($val1,$hash)){
	
	$dbconn = conectare("localhost","5432","auth","postgres");
	$instr="SELECT username FROM users WHERE id='$id'";
	$query = cerere($dbconn, $instr);
	$arr = extragere($query);
	echo "Sunteti logat ca $arr[0].";
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
