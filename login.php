<?php
if (isset($_COOKIE["UserCookie"])&&!empty($_COOKIE["UserCookie"])){

	header('Location: http://127.0.0.1:9000/index.php');

}else{
?>
<html>
<body>
<p>Pagina Login</p>
<form action="login.php" method="post">
Numele utilizatorului: <input type="text" name="username" required><br>
Parola: <input type="password" name="password" minlength="6" required><br>
<input type="submit" name="submit" value="Login">
</form>

</body>
</html>
<?php
if(isset($_POST['submit'])) {
	$dbconn = pg_connect("host=localhost port=5432 dbname=auth user=postgres");

	$username = $_POST['username'];

	$key="14011999";
	
	
	$password = $_POST['password'];

	$query = pg_query($dbconn, "SELECT id, password FROM users WHERE username='$username'");
	
	$arr = pg_fetch_array($query, 0, PGSQL_NUM);
	if (password_verify($password, $arr[1])) {

		 $hash=hash_hmac('md5',$arr[0],$key);
        	 $secret="$arr[0].$hash";
        	 setcookie("UserCookie", $secret);
        	 header('Location: http://127.0.0.1:9000/index.php');
	} else {
        	echo 'Parola incorecta.';
?>
<html>
	        <p>Puteti incerca din nou sau va puteti inregistra <a href="http://127.0.0.1:9000/register.php">aici</a></p>
</html>
<?php
		}
 	}	
}
?>
