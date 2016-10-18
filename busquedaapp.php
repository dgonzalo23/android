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

// Select all the rows in the markers table
$fechainicial = $_POST["datetimepicker6"];
$fechafinal = $_POST["datetimepicker7"];
#$horainicial = $_POST["datetimepicker8"];
#$horafinal= $_POST["datetimepicker9"];
$query = "SELECT * FROM app WHERE (fechahora BETWEEN '$fechainicial' AND '$fechafinal')";
$result = mysql_query($query);
if (!$result) {  
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
//while ($row = @mysql_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  echo '<marker ';
//  echo 'lat="' . $row['lat'] . '" ';
//  echo 'lng="' . $row['lng'] . '" ';
//  echo 'datetime="' . $row['fechahora'] . '" ';
    echo 'lat="11.01946" ';
    echo 'lng="-74.85147" ';
  echo '/>';
  echo '<marker ';
//  echo 'lat="' . $row['lat'] . '" ';
//  echo 'lng="' . $row['lng'] . '" ';
//  echo 'datetime="' . $row['fechahora'] . '" ';
    echo 'lat="11.01986" ';
    echo 'lng="-74.85177" ';
  echo '/>';
//(})

// End XML file
echo '</markers>';

//header('Location: lochis.php');
//exit();

?>