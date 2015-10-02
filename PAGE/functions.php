<?php
	//Kõik AB'iga seotud
	
	//ühenduse loomiseks kasutajaga
	require_once("../../configglobal.php");
	$database = "if15_rimo";

	//lisame kasutaja andmebaasi
	function createUser(){
		$mysqli = new mysqli($servername, $server_username, $server_password, $database);
		$stmt = $mysqli->prepare("INSERT INTO user_info (email, password, username) VALUES (?, ?, ?)");
			//?? saavad väärtused
			$stmt->bind_param("sss", $Cemail, $password_hash, $Cusername);
			$stmt->execute();
			$stmt->close();
		$mysqli->close();
	}
	//logime sisse
	function loginUser(){
		$mysqli = new mysqli($servername, $server_username, $server_password, $database);
		$stmt = $mysqli->prepare("SELECT id, email FROM user_info WHERE email=? AND password=?");
			$stmt->bind_param("ss", $email, $password_hash);
			//vastuse muutujatesse				
			$stmt->bind_result($id_from_db, $email_from_db);
			$stmt->execute();
			//kas saime andmebaasist kätte?
			if($stmt->fetch()){
				$login_accepted = "You can login. Email is ".$email." and password is ".$password.". User id= ".$id_from_db;
			}else{
				echo "Wrong password or email";
			}
			$stmt->close();
		$mysqli->close();
	}

?>