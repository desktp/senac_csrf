<img height='50px' width='50p' src="https://scontent-gru2-1.xx.fbcdn.net/v/t1.0-9/947348_1024747310925875_7924553947953677794_n.jpg?oh=97707ced52f8a218014f1091e5493e5e&oe=579EFC96"/>
<br>
	
<form action="like.php">
        <input type="submit" value="Like!"></input>
</form>
<?php
include("../conn.php");
$conn = new Db();
$likes = $conn->getLikes();
echo $likes['likes'];
?>
