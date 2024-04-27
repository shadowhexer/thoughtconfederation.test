<?php
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
require 'connect.php';

// 3. hijack then destroy session specified.
session_id();
session_start();

session_gc();

session_destroy();

// Close the database connection
header('Location: //thoughtconfederation.test/project/index.html');
?>