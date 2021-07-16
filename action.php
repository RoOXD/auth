<?php

$dbconn = pg_connect("host=localhost port=5432 dbname=auth user=postgres");

$name = htmlspecialchars($_POST['name'],ENT_QUOTES);
$note = password_hash($_POST['note'],PASSWORD_BCRYPT);

$query = pg_query_params($dbconn, 'INSERT INTO users (username, password) VALUES ($1,$2)', array($name,$note));
if ( $query ) {
          echo  "Inregistrare efectuata cu succes";
      }else{
	      echo "Nume de utilizator luat!";
      }

?>
