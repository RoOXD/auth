<?php
if (isset($_COOKIE["UserCookie"])&&!empty($_COOKIE["UserCookie"])){

	header('Location: http://127.0.0.1:9000/index.php');

}else{
?>
<html>
<body>
<p>Pagina Login</p>
<form action="login.php" method="post">
Numele utilizatorului: <input type="text" name="name" required><br>
Parola: <input type="password" name="note" minlength="6" required><br>
<input type="submit" name="submit" value="Login">
</form>

</body>
</html>
<?php
if(isset($_POST['submit'])) {
	$dbconn = pg_connect("host=localhost port=5432 dbname=auth user=postgres");

	$name = $_POST['name'];
	setcookie("UserCookie", $name);
	$note = $_POST['note'];

	$query = pg_query($dbconn, "SELECT password FROM users WHERE username='$name'");

	$arr = pg_fetch_array($query, 0, PGSQL_NUM);
	if (password_verify($note, $arr[0])) {
        	 header('Location: http://127.0.0.1:9000/index.php');
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
 	}	
}
?>

