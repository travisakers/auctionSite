<?PHP
session_start();
include 'ChromePhp.php';
echo 'hello!';
$username = "sjs4025";
$password = "qweqaz!234567";
$server = "classroom.cs.unc.edu";
$database = "sjs4025db";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (! empty($_POST['bidItem'])) {
    
    $item_id = $_POST['bidItem'];
} else {}
if (! empty($_POST['bidAmount'])) {
    
    $price = $_POST['bidAmount'];
} else {}

$bidder_name = $_SESSION['username'];

$bidder_id_sql = "SELECT id FROM User WHERE username = '$bidder_name'";
$bidder_id_obj = $conn->query($bidder_id_sql);
$bidderrow = mysqli_fetch_assoc($bidder_id_obj);
$bidder_id = $row["id"];
$bidder_id = 1;

$bid_sql = "INSERT INTO Bid (item_id, buyer_id, bid_price) VALUES('$item_id','$bidder_id', '$price')";
if ($conn->query($bid_sql) === TRUE) {
    echo "New Item added \n";
} else {
    echo "Error: " . $bid_sql . '\n' . $conn->error;
}
mysqli_close($conn);
?>