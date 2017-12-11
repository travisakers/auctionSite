<?php
require 'MySql.php';

class Membership
{

    function validate_user($username, $password)
    { // takes what user entered in boxes and runs info against database
        $mysql = new MySql(); // creates new instance of MySql class
        $ensure_credentials = $mysql->verify_credentials($username, $password); // holds whatever value verify credentials returns
        
        if ($ensure_credentials) { // if ensure credentials returns true this will run
            
            $_SESSION['status'] = 'authorized'; // creates the session
            $_SESSION['username'] = $username;
            // header("location: auction.html"); //sends to secret page, said its bad in video, instead can just return true and in html part redirect them/do something with session from there
            return true;
        } else
            return "Please enter correct username and password"; // still need to set expiration
    }

    function log_user_out()
    {
        if (isset($_SESSION['status'])) {
            unset($_SESSION['status']);
            
            if (isset($_COOKIE[session_name()])) { // gets rid of cookie on users compu ter by setting it to a time before
                setcookie(session_name(), '', time() - 10000);
                session_destroy(); // destroys session
            }
        }
    }
}

