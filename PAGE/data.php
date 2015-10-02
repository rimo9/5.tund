<?php
	//sisestus vorm
	
	//laeme functions faili
	require_once("functions.php");
	
	//kontrollin, kas kasutaja ei ole sisse loginud
	if(!isset($_SESSION["id_from_db"])){
		//suuname login lehele kui on sisseloginud
		header("Location: login.php");
	}
?>