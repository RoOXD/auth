<?php

$key="14011999";

function conectare($host,$port,$nume,$user){

	$dbconn = pg_connect("host=$host port=$port dbname=$nume user=$user");
	return $dbconn;

}
function cerere($dbconn,$instructiune){

	$query = pg_query($dbconn, $instructiune);
	return $query;

}
function extragere($query){

	$arr = pg_fetch_array($query, 0, PGSQL_NUM);
	return $arr;
}

?>
