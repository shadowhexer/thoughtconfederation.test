
<?php
/*	require 'connect.php';

	if ($db) {



		$a = $_POST['biography'];
		$username = $_SESSION['username'];


		$stmt = $db->prepare("UPDATE account.newaccount SET biography = :a, username =  WHERE username = :b");
		$stmt->bindParam(':a', $a);
		$stmt->bindParam(':b', $username);
		$stmt->execute();

		header('Location: user.php')
	} */

    session_id();
    session_start();
    require 'connect.php';

    if(!isset($_SESSION['id']))
    {
        header('Location: project/login.php');
        exit();
	}
	
	$json = file_get_contents('http://thoughtconfederation.test/project/forms/profile.php?param=response.json');
	$json_data = json_decode($json, true);
	
	if($db && isset($_POST['update']))
	{
	
		$firstname = $_POST['first_name'];
		$lastname = $_POST['last_name'];
	
		if(isset($_POST['display_name']) && $_POST['display_name'] !== $json_data['displayName'])
		{
			$displayname = $_POST['display_name'];
		}
			
		if(isset($_POST['email']) && $_POST['email'] !== $json_data['email']) 
		{
			$email = $_POST['email'];
		}
			
		$num = preg_replace('/\s+/', '', $_POST['phone_number']);
	
			$barangay = $_POST['barangay1'];
			$city = $_POST['city1'];
			$province = $_POST['province1'];
			
		$region = $_POST['region1'];
		

		$birth = $_POST['birthdate'];

		if(isset($_POST['biography']) && $_POST['biography'] !== $json_data['bio'])
		{
			$bio = $_POST['biography'];
		}

		$sesh_name = $_SESSION['id'];
		
	    // Check if the email already exists
	    $checkEmailQuery = "SELECT * FROM account.users WHERE email = :email AND user_id != :sesh_name";

	    $checkEmailStmt = $db->prepare($checkEmailQuery);
	    $checkEmailStmt->bindParam(':email', $email, PDO::PARAM_STR);
		$checkEmailStmt->bindParam(':sesh_name', $sesh_name, PDO::PARAM_STR);
	    $checkEmailStmt->execute();
	    $emailCount = $checkEmailStmt->fetchColumn();

	    if ($emailCount > 0)
	    {
    	// Display an error message or redirect back to the registration form
    	    $response = [
			'status' => 'error',
			'message' => 'Email already exists!'
		    ];
			echo json_encode($response);
	    }
	    else 
	    {

		    $say = "UPDATE account.users SET first_name = :firstname, last_name = :lastname, display_name = :displayname, email = :email, phone_number = :num, birthdate = :birth, region = :region, province = :province, city = :city, barangay = :barangay, biography = :bio WHERE user_id = :sess_name";

		    $stmt = $db->prepare($say);
	
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
			$stmt->bindParam('sess_name', $sesh_name, PDO::PARAM_STR);

    	    $stmt->execute();
            $db = NULL;
			
    	    header('Location: /project/user.php');
            exit();
	    }
	}

	else if($db && isset($_POST['secureUpdate']))
	{
	
		if(isset($_POST['username']) && $_POST['username'] !== $json_data['username'])
		{
			$username = $_POST['username'];
		}
			
		if($_POST['passkey'] !== NULL)
		{
			$passkey = $_POST['passkey'];
		}

		$sesh_name = $_SESSION['id'];

		$say = "UPDATE account.newaccount SET username = :username, passkey = crypt(:passkey, gen_salt('bf')) WHERE id = :sess_name";

		$stmt = $db->prepare($say);
	
    	$stmt->bindParam(':username', $username, PDO::PARAM_STR);
		$stmt->bindParam(':sess_name', $sesh_name, PDO::PARAM_STR);
    	$stmt->bindParam(':passkey', $passkey, PDO::PARAM_STR);

    	$stmt->execute();
        $db = NULL;
			
    	header('Location: http://localhost/login/forms/user.php');
        exit();
	}

?>