<?php

$dbconn = pg_connect("host=localhost port=5432 dbname=auth user=postgres");

pg_close($dbconn);

?>
<html>
<body>
<p>Formular inregistrare.Introduceti datele.</p>
<form action="action.php" method="post">
Nume utilizator: <input type="text" name="name" required><br>
Parola: <input type="password" name="note" minlength="6" required><br>
<input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
