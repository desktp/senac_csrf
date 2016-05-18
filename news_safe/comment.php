<?php
include("../conn.php");

$conn = new Db();

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$idNoticia = test_input($_POST['idNoticia']);
$autorComentario = test_input($_POST['autorComentario']);
$textoComentario = test_input($_POST['textoComentario']);

$das = $conn->insertComment($idNoticia, $autorComentario, $textoComentario);
header('Location: news.php?id='.$idNoticia);
?>
