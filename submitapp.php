<?php
require("dbinfoapp.php");

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

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
$Longitud = mysql_real_escape_string($connection, $_GET['Longitud']);
$Fechahora = mysql_real_escape_string($connection, $_GET['Fechahora']);
$Variable = mysql_real_escape_string($connection, $_GET['Variable']);

$query ="INSERT IN android (lat, lng, fechahora, variable) VALUES ('$Latitud', '$Longitud', '$Fechahora', '$Variable')";

$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

?>