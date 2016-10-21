<?php
require("dbinfoapp.php");


// Opens a connection to a MySQL server
$connection=mysql_connect ($servername, $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($dbname, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}
//================================================================

$Latitud = mysql_real_escape_string($connection, $_GET['Latitud']);

$query ="INSERT INTO android(lat) VALUES('$Latitud')";

$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
echo "Latitud es: $Latitud"

?>