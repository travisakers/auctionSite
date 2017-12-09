<? php //need to write a little bit of code to check and see if the user has a session
       // if they do, let them in and if not get rid of them and send them back to login.php (in example this page is index.php)

require_once 'Membership.php';


?>

<!DOCTYPE HTML>
<html lang = "en">
<head>
  <!-- basic.html -->
  <title>Login End Page</title>
  <meta charset = "UTF-8" />
</head>
<body>

<div id="container">

  <p>
    Test to see if login is working. 
  </p>
  <a href="login_test_page.php?status=loggedout">Log Out</a>

</div>
</body>
</html>

