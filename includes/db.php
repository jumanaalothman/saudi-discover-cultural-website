<?php
$host = "sql205.infinityfree.com";
$user = "if0_41856171";
$password = "LnY71wAFSjER";
$database = "if0_41856171_discover_saudi";
$port = 3306;

$conn = mysqli_connect($host, $user, $password, $database, $port);

if (!$conn) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");
?>