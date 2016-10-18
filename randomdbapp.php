<?php

require("dbinfoapp.php");
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$la = '10.986550';
$lo = '-74.810031';
set_time_limit(60);
$start = time();

for ($i = 0; $i < 59; ++$i) {
    $sql = "INSERT INTO random (lat,lng)
VALUES ($la,$lo)";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
    $la = $la + '0.000001';
    time_sleep_until($start + $i + 1);
}

mysqli_close($conn);
?>