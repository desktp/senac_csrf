<?php
Class Db {

	protected static $conn;

	public function connect(){
		if(!isset(self::$conn)){
			$config = parse_ini_file('config.ini');
			self::$conn = new mysqli('localhost', $config['username'], $config['password'], $config['db']);
		}

		if(self::$conn === false){
			return false;
		}

	return self::$conn;
	}

	public function getAllTitles(){
		$conn = $this->connect();
		
		$query = 'SELECT `idNoticia`, `tituloNoticia`, `dataNoticia` FROM `noticias`';
		$result = $conn->query($query);
		
		if ($result === false){
			return false;
		}
		
		while ($row = $result -> fetch_assoc()){
			$rows[] = $row;
		}

		return $rows;
	}

	public function getNews($idNoticia){
		$conn = $this->connect();
		$query = 'select `tituloNoticia`, `textoNoticia`, `dataNoticia` from `noticias` where `idNoticia` = ?';
		$stmt = $conn->prepare($query);
		$stmt->bind_param("s",$idNoticia);
		$stmt->execute();
		$result = $stmt->get_result() or die(mysqli_error($conn));
		
		if ($result === false){
			return false;
		}
		
		$row = $result->fetch_assoc();
			
		return $row;
	}

	public function getComments($idNoticia){
		$conn = $this->connect();
		$query = 'select `autorComentario`, `textoComentario` from `comentarios` where `idNoticia` = ?';
		$stmt = $conn->prepare($query);
		$stmt->bind_param("s",$idNoticia);
		$stmt->execute();
		$result = $stmt->get_result() or die(mysqli_error($conn));
		
		if ($result === false){
			return false;
		}
		
		while ($row = $result -> fetch_assoc()){
			$rows[] = $row;
		}

		return $rows;
	}


	public function insertComment($idNoticia, $autorComentario, $textoComentario){
		$conn = $this->connect();
		$query = "INSERT INTO `comentarios`(`idNoticia`, `autorComentario`, `textoComentario`) VALUES (?, ?, ?)";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("sss", $idNoticia, $autorComentario, $textoComentario);
		$result = $stmt->execute() or die(mysqli_error($conn));
		
		//return $result;
	}

	public function getLikes(){
		$conn = $this->connect();
		$query = 'select `likes` from `likes` where `idFoto` = 1';
		$stmt = $conn->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result() or die(mysqli_error($conn));

                if ($result === false){
                        return false;
                }

                $row = $result->fetch_assoc();

                return $row;
	}
	
	public function like(){
		 $conn = $this->connect();
                $query = "UPDATE `likes` SET `likes`=(`likes` + 1) WHERE `idFoto` = 1";
                $stmt = $conn->prepare($query);
                $result = $stmt->execute() or die(mysqli_error($conn));
	}
}	
