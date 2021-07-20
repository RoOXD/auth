<?php
require 'auth.php';

	
$value=$_COOKIE["UserCookie"];

if (decodeUserID($value)){
	
	$dbconn = pg_connect("host=localhost port=5432 dbname=auth user=postgres");
	$query = pg_query_params($dbconn, 'SELECT username FROM users WHERE id=$1',array($id));
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
