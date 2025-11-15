<?php
session_start();
$conn = new mysqli("localhost", "root", "", "myshop");
if ($conn->connect_error) die("Connection failed");
?>