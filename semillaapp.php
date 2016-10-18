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

$fechainicial= $_POST['fechainicial'];
$fechafinal= $_POST['fechafinal'];


$query = "SELECT * FROM android WHERE (fechahora BETWEEN '$fechainicial' AND '$fechafinal')";
$result = mysql_query($query);
if (!$result) {  
  die('Invalid query: ' . mysql_error());
}

$coordenadas = array();
$i = 0;
while ($var = mysql_fetch_array($result)){    
    $coordenadas[$i] = $var;
    $i++;
}

echo json_encode($coordenadas)

?>