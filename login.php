<?php
require 'auth.php';

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
	$dbconn = $dbconn = conectare("localhost","5432","auth","postgres");

	$username = $_POST['username'];	
	
	$password = $_POST['password'];

	$instr = "SELECT id, password FROM users WHERE username='$username'";
	$query = cerere($dbconn, $instr);
	
	$arr = extragere($query);
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
