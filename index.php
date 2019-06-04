<?php
require 'inc/autoload.php';
$database = new Database();
$database->connect();
$query = "SELECT * FROM user";
$users = $database->query($query, 'User');
?>
