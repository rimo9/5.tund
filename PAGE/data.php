<?php
	//sisestus vorm
	
	//laeme functions faili
	require_once("functions.php");
	
	//kontrollin, kas kasutaja ei ole sisse loginud
	if(!isset($_SESSION["id_from_db"])){
		//suuname login lehele kui on sisseloginud
		header("Location: login.php");
	}
	//logni välja
	if(isset($_GET["logout"])){
		//kustutab kõik session muutujad
		session_destroy();
		header("Location: login.php");
	}
?>

<p>Tere, <?=$_SESSION["user_email"];?>
<a href="?logout=1"> Logi välja</a>
</p>