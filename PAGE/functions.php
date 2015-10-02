<?php
	//K�ik AB'iga seotud
	
	//�henduse loomiseks kasutajaga
	require_once("../../configglobal.php");
	$database = "if15_rimo";

	//lisame kasutaja andmebaasi
	function createUser($Cemail, $password_hash, $Cusername){
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("INSERT INTO user_info (email, password, username) VALUES (?, ?, ?)");
		//?? saavad v��rtused
		$stmt->bind_param("sss", $Cemail, $password_hash, $Cusername);
		$stmt->execute();
		$stmt->close();
		$mysqli->close();
	}
	//logime sisse
	function loginUser($email, $password_hash){
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("SELECT id, email FROM user_info WHERE email=? AND password=?");
		$stmt->bind_param("ss", $email, $password_hash);
		//vastuse muutujatesse				
		$stmt->bind_result($id_from_db, $email_from_db);
		$stmt->execute();
		//kas saime andmebaasist k�tte?
		if($stmt->fetch()){
			echo " User id=".$id_from_db;
		}else{
			echo "Wrong password or email";
		}
		$stmt->close();
		$mysqli->close();
	}
?>