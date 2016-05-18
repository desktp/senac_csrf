<?php
error_reporting(E_ALL);
require_once('../conn.php');

$conn = new db();
$news = $conn->getAllTitles();


foreach($news as $i => $noticia){
	
	echo "<a href='news.php?id=" . $noticia['idNoticia'] . "'>" . $noticia['tituloNoticia'] . "</a> </br>";
}
?>
