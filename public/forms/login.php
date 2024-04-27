<?php
session_id();
session_start();

require 'connect.php';

if(isset($_SESSION['id']))
{
    header('Location: /user');
    exit();
}

// Check if the form is submitted
if (isset($_POST['login'])) 
{
    session_regenerate_id(true);
    // Get the user input
    $email = $_POST['email'];
    $password = $_POST['passkey']; // Don't hash the password here

    // Validate the user input
    if (empty($email) || empty($password)) {
        // Display an error message
        echo "Please fill in all the fields";
    } else {
        // Prepare a SQL statement
        $sql = "SELECT email, passkey, user_id, role FROM account.users WHERE email = :email";
        // Create a prepared statement
        $stmt = $db->prepare($sql);
        // Bind the parameter
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        // Execute the statement
        $stmt->execute();
        // Get the result
        $result = $stmt->rowCount(); // Use rowCount() to get the number of rows

        // Check if the user exists
        if ($result > 0) {
            // Fetch the user data
            $row = $stmt->fetch();

            // Verify the password
            if (crypt($password, $row['passkey']) === $row['passkey']) 
            {
                // Set the session variables
                $_SESSION['id'] = $row['user_id'];
                //$myID = session_id();

                $response = array('status' => 'success');
                echo json_encode($response);

                // Redirect to the dashboard page
                header('Location: /');
                
                exit(1); // Add exit to stop script execution after redirection
            } else {
                // Display an error message
                echo "Invalid password";
            }
        } else {
            // Display an error message
            echo "Account does not exist";
        }
        // Close the statement
        $stmt = null;
        $db = null;
    }
    exit();
}
// Close the database connection

?>