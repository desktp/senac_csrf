<?php
include("../conn.php");
session_start();

$conn = new Db();
if($_POST["token"] == $_SESSION["token"])
{
	$conn->like();
}
header('Location: index.php');
?>
