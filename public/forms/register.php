<?php
	
	require 'connect.php';

	$id = bin2hex(random_bytes(5));
	$firstname = $_POST['first_name'];
	$lastname = $_POST['last_name'];
	$displayname = $_POST['display_name'];
	$email = $_POST['email'];
	$num = preg_replace('/\s+/', '', $_POST['phone_number']); // Remove spaces and assign
	
	$barangay = $_POST['barangay'];
	$city = $_POST['city'];
	$province = $_POST['province'];
	$region = $_POST['region'];
	
	$birth = $_POST['birthdate'];
	$bio = $_POST['biography'];
	$passkey = $_POST['passkey'];

	$asigned_role = 'user';
	$role = $asigned_role;
	

	// Check if the email already exists
	$checkEmailQuery = "SELECT * FROM account.users WHERE email = :email";
	$checkEmailStmt = $db->prepare($checkEmailQuery);
	$checkEmailStmt->bindParam(':email', $email, PDO::PARAM_STR);
	$checkEmailStmt->execute();
	$emailCount = $checkEmailStmt->fetchColumn();

	if ($emailCount > 0) 
	{
    	// Display an error message or redirect back to the registration form
    	$response = [
			'status' => 'error',
			'message' => 'Email already exists!'
		];
	}
	else 
	{
		$say = "INSERT INTO account.users (user_id, first_name, last_name, display_name, email, phone_number, birthdate, region, province, city, barangay, biography, passkey, role) VALUES (:id, :firstname, :lastname, :displayname, :email, :num, :birth, :region, :province, :city, :barangay, :bio, crypt(:passkey, gen_salt('bf')), :role);";

		$stmt = $db->prepare($say);
	
		$stmt->bindParam(':id', $id, PDO::PARAM_STR);
    	$stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
    	$stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
		$stmt->bindParam(':displayname', $displayname, PDO::PARAM_STR);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':num', $num, PDO::PARAM_STR);
	
    	$stmt->bindParam(':barangay', $barangay, PDO::PARAM_STR);
    	$stmt->bindParam(':city', $city, PDO::PARAM_STR);
    	$stmt->bindParam(':province', $province, PDO::PARAM_STR);
    	$stmt->bindParam(':region', $region, PDO::PARAM_STR);
	
		$stmt->bindParam(':birth', $birth);
		$stmt->bindParam(':bio', $bio, PDO::PARAM_STR);
    	$stmt->bindParam(':passkey', $passkey, PDO::PARAM_STR);
		$stmt->bindParam(':role', $role, PDO::PARAM_STR);

    	$stmt->execute();

    	header('Location: forms/login.php');
		exit();
	}
?>