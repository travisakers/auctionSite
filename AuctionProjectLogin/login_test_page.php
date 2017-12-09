<?php            //when user clicks on the submit button it will post to itself? (this is login.php in the example)
session_start();  // sessions keeps user logged in, validates user using classes (someClass->validate)
require_once 'Membership.php';
$membership = new Membership();

//If user clicks log out link
if(isset($_GET['status']) && $_GET['status'] == 'loggedout'){ //if condition met then we know the user wants to log out, checks for 'status' in URL
	$membership->log_user_out(); 
}

//Did the user enter a username/password and hit "submit"?
if($_POST && !empty($_POST['username']) && !empty($_POST['password'])){ //checks to see if the user entered a un or pwd
	$response = $membership->validate_User($_POST['username'], $_POST['password']);
}


?> 

<!DOCTYPE html>

<html>
  <head>
  	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
    <title>Login Start Page</title>
    <!-- <link rel="stylesheet" type="text/css" href="auction.css">   he links his own css here
    <script src="jquery-3.2.1.js"></script> 
    <script src="auctiontest.js"></script> -->
  </head>

<body> 

<div id="login">
<form method="post" action="">
	<h2>Login <small>enter your information</small></h2>
	<p>
<label for="name">Username: </label>
<input name="username" type="text"/>
 	</p>

 	<p>
<label for="password">Password: </label>
<input name="password" type="password"/>
	</p> 

	<p>
<input type="submit" id="submit" value="Login" name="submit">		
	</p>
</form>
<?php if(isset($response)) echo "<h4 class = 'alert'>" . $response . "</h4>"; ?>

<!-- <p> Correct username = henry123</p>
<br>
<p> Correct password = password</p>
<br>

<form id='logout_form'>
<button id="logout_button" type="submit">Logout</button>
</form>
 -->
</div>

</body>
</html>