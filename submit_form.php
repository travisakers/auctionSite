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
if (! empty($_POST['itemname'])) {
    
    $item_name = $_POST['itemname'];
} else {}
if (! empty($_POST['itemdescription'])) {
    $description = $_POST['itemdescription'];
} else {}
if (! empty($_POST['startingprice'])) {
    $price = $_POST['startingprice'];
} else {}
if (! empty($_POST['itemcategory'])) {
    $category = $_POST['itemcategory'];
} else {}
if (! empty($_POST['expirationdate'])) {
    $exp_date = $_POST['expirationdate'];
} else {}

$categoryID_sql = "SELECT id
				   FROM Category
				   WHERE name = '$category'";

$category_id_obj = $conn->query($categoryID_sql);
$row = mysqli_fetch_assoc($category_id_obj); // gets the single array category id
$category_id = $row["id"];
$seller_name = $_SESSION['username'];

$seller_id_sql = "SELECT id FROM User WHERE username = '$seller_name'";
$seller_id_obj = $conn->query($seller_id_sql);
$sellerrow = mysqli_fetch_assoc($seller_id_obj);
$seller_id = $row["id"];
$seller_id = 1;

$item_sql = "INSERT INTO Item (name, seller_id, category_id, starting_price, description, exp_date)
			 VALUES ('$item_name', '$seller_id', '$category_id', '$price', '$description', '$exp_date')";



if ($conn->query($item_sql) === TRUE) {
    
    $item_id = $conn->insert_id;
    $bid_sql = "INSERT INTO Bid (item_id, buyer_id, bid_price) VALUES('$item_id','$seller_id', '$price')";
    printf ("New Record has id %d.\n", $mysqli->insert_id);
    if ($conn->query($bid_sql) === TRUE) {
        echo "New Item added \n";
    } else {
        echo "Error: " . $bid_sql . '\n' . $conn->error;
    }
} else {
    echo "Error: " . $item_sql . '\n' . $conn->error;
}
mysqli_close($conn);
?>