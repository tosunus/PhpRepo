<?php
/* Database connection start */
$servername = "lnx.netdirekt.com.tr";
$username = "da_admin";
$password = "!!da11ama!!";
$dbname = "manage";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
$conn->set_charset('utf8');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>
