<?php

$dbconn = pg_connect("host=localhost port=5432 dbname=auth user=postgres");

$name = $_POST['name'];
$note = $_POST['note'];

$query = pg_query($dbconn, "SELECT password FROM users WHERE username='$name'");

$arr = pg_fetch_array($query, 0, PGSQL_NUM);
if (password_verify($note, $arr[0])) {
	echo "Sunteti logat ca $name.";
?>
<html>	
	<form action="logout.php">
    	<input type="submit" value="Logout" />
	</form>
</html>
<?php
} else {
	echo 'Parola incorecta.';
?>
<html>
        <p>Puteti incerca din nou <a href="http://127.0.0.1:9000/login.php">aici</a> sau va puteti inregistra <a href="http://127.0.0.1:9000/register.php">aici</a></p>
</html>
<?php
}
?>
