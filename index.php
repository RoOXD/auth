<?php

$secret="14011999";	
$value=$_COOKIE["UserCookie"];
$parts = explode(".", $value);
$id = $parts[0];
$hash = $parts[1];

$val1=hash_hmac('md5',$id, $secret);

if (hash_equals($val1,$hash)){

	$dbconn = pg_connect("host=localhost port=5432 dbname=auth user=postgres");
	$query = pg_query($dbconn, "SELECT username FROM users WHERE id='$id'");
	$arr = pg_fetch_array($query, 0, PGSQL_NUM);
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
