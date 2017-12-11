<?php
// when user clicks on the submit button it will post to itself? (this is login.php in the example)
session_start(); // sessions keeps user logged in, validates user using classes (someClass->validate)
require_once 'Membership.php';
$membership = new Membership();

// If user clicks log out link
if (isset($_GET['status']) && $_GET['status'] == 'loggedout') { // if condition met then we know the user wants to log out, checks for 'status' in URL
    $membership->log_user_out();
}

// Did the user enter a username/password and hit "submit"?
if ($_POST && ! empty($_POST['usernameLogin']) && ! empty($_POST['passwordLogin'])) { // checks to see if the user entered a un or pwd
    $response = $membership->validate_User($_POST['usernameLogin'], $_POST['passwordLogin']);
    if ($response === true) {
        echo $_SESSION['username'];
        // echo "Please enter correct username and password";
    } else {
        echo "Please enter correct username and password";
    }
    // echo $response;
    // echo "<h4 class = 'alert'>" . $response . "</h4>";
}

?> 
