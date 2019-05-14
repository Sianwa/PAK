<?php
//connect.php
$server = 'localhost';
$username   = 'root';
$password   = '';
$database   = 'forum';
 
$db = new mysqli($server, $username, $password, $database);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>