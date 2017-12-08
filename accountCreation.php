<?PHP

$username = "sjs4025";
$password = "qweqaz!234567";
$server = "classroom.cs.unc.edu";
$database = "sjs4025db";

$conn = new mysqli($server, $username, $password, $database);
if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
}

$first2 = $_POST['first1'];
$last2 = $_POST['last1'];
$email2 = $_POST['email1'];
$username2 = $_POST['username1'];
$password2 = $_POST['password1'];

$query = mysql_query("INSERT INTO User(first, last, email, username, password)
					  VALUES ('$first2', '$last2', '$email2', '$username2', '$password2')");

echo "Account Created! Thank You!";

mysql_close($conn);
?>