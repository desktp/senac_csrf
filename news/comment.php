<?php
include("../conn.php");

$conn = new Db();

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$idNoticia = $_POST['idNoticia'];
$autorComentario = $_POST['autorComentario'];
$textoComentario = $_POST['textoComentario'];

$das = $conn->insertComment($idNoticia, $autorComentario, $textoComentario);
header('Location: news.php?id='.$idNoticia);
?>
