<?php
	/* Handle CORS */

	// Specify domains from which requests are allowed
	header('Access-Control-Allow-Origin: http://127.0.0.1:3000, /thoughtconfederation.test/');

	// Specify which request methods are allowed
	header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');

	header('Access-Control-Allow-Credentials: true');

	// Additional headers which may be sent along with the CORS request
	header('Access-Control-Allow-Headers: X-Requested-With, Origin, Content-Type, X-CSRF-Token, Accept');

	// Set the age to 1 day to improve speed/caching.
	header('Access-Control-Max-Age: 86400');

	header('Content-Type: application/json, charset=UTF-8');

	$initial = "pgsql: host=localhost, port=5432, dbname = accounts_db";
	$user = "postgres";
	$pass = "chelsea0710"; 

	try
	{
		$db = new PDO($initial, $user, $pass);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
	}
	
	catch(PDOException $e)
	{
		print_r($e);
	}
	$_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>