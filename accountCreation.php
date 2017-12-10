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

$account_sql = "INSERT INTO User(first, last, email, username, password)
					VALUES ('$first2', '$last2', '$email2', '$username2', '$password2')";

echo "Account Created! Thank You!";

if ($conn->query($account_sql) === TRUE) {
    echo "New User Created \n";
} else {
    echo "Error: " . $account_sql . '\n' . $conn->error;
}
mysqli_close($conn);

?>