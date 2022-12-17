<?php 

	$user = 'root';
	$pass = '';
	$dns = 'mysql:host=localhost;dbname=php_ajax';

	// Creat Connexion 
	// Connexion à la base de donnée 

	try 
	{
		$db = new PDO($dns , $user , $pass);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//echo "you are connected";
	}
	// gestion des erreurs
	catch (PDOException $e)
	{
		die("Connection Failed !:". $e->getMessage() );
	}