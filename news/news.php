<?php
require_once("../conn.php");

if (!isset($_GET['id'])){
	echo "Notícia inválida";
} else {
	$conn = new Db();
	$news = $conn->getNews($_GET['id']);
	$comments = $conn->getComments($_GET['id']);
	echo <<<EOF
	<h1>{$news['tituloNoticia']}</h1>
	<h3>{$news['dataNoticia']}</h3>
	<p>{$news['textoNoticia']}</p>
EOF;
	foreach($comments as $i => $comment){
		echo $comment['textoComentario']. " por: <b>" . $comment['autorComentario'] . "</b><br>";
	}
	
	echo <<<EOF
	<hr>
	
	<form action="comment.php" method="POST">
		<textarea name="textoComentario" cols="50" rows="5">Comente aqui... </textarea>
		<br>
		Nome: <input type="text" name="autorComentario"/>
		<input type="hidden" value="{$_GET['id']}" name="idNoticia"/>
		<br>
		<input type="submit" />
	</form>
EOF;
}
?>
