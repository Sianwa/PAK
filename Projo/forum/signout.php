<?php

include 'header.php';
// remove all session variables

echo '<h3>Signed Out</h3>';
 
//first, check if the user is already signed in. If that is the case, there is no need to display this page
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
    session_unset();
    echo 'Succesfully signed out, you can go back to the <a href="index.php">Homepage</a> if you want.';
}

// destroy the session 
session_destroy(); 

include 'footer.php';
?>
