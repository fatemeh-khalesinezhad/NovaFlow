<?php
$link = mysqli_connect("localhost", "root", "", "novaflow_db1");
if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($link, "utf8mb4");
?>