<?php
include("../conn.php");
$conn = new Db();
$conn->like();
header('Location: index.php');
?>
