<?php
    require 'connect.php';

	$stmt = $db->prepare("SELECT * FROM account.users WHERE user_id = :id");
    $stmt->bindParam(':id', $_SESSION['id'], PDO::PARAM_STR);
    $stmt->execute();

        // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    /* Check if the query returned any result
    if ($result)
    {
        // Create a response array with the fetched values
        $response = array(
                'firstname' => $result['first_name'],
                'lastname' => $result['last_name'],
                'displayName' => $result['display_name'],
                'email' => $result['email'],
                'phoneNumber' => $result['phone_number'],
                'birthdate' => $result['birthdate'],
                'bio' => $result['biography'],
                'passkey' => $result['passkey'],
                'region' => $result['region'],
                'province' => $result['province'],
                'city-municipality' => $result['city'],
                'barangay' => $result['barangay']      
        );
        
    } else 
    {
        // Handle the case when no result is found
        $response = ['status' => 'error', 'message' => 'User not found'];
    }

    // Convert the response array to JSON before sending it back to the client

    $json = json_encode($response, JSON_PRETTY_PRINT); // To arrange JSON's data

    if ($json === false) 
    {
        // Avoid echo of empty string (which is invalid JSON), and
        // JSONify the error message instead:
        $json = json_encode(["jsonError" => json_last_error_msg()]);
        if ($json === false)
        {
            // This should not happen, but we go all the way now:
            $json = '{"jsonError":"unknown"}';
        }
        // Set HTTP response status code to: 500 - Internal Server Error
        http_response_code(500);
    }
    $db = null; */
    header('Content-Type: text/html; charset=utf-8'); // This peace of shit is what took me 4 days to find out.
?>