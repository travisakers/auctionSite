<?PHP

$username = "sjs4025";
$password = "qweqaz!234567";
$server = "classroom.cs.unc.edu";
$database = "sjs4025db";

$conn = new mysqli($server, $username, $password, $database);
if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
}
                                        //HTML form 
$item_name = $_POST['item_name'];       //get item name from name input field
$seller_name = $_POST['seller_name'];   
$description = $_POST['item_description'];
//$category = $_POST['item_category'];      //may not need if we set up categories
$price = $_POST['item_price'];
$exp_date = $_POST['exp_date'];

//Gonna see if I can pull current date into $posted_date variable

$item_sql = "INSERT INTO Item (name, price, description, exp_date)
          VALUES ('$item_name', '$price', '$description', '$exp_date')";


$seller_sql = "INSERT INTO Seller (name) VALUES ('$seller_name')";

$conn->query($item_sql);
$conn->query($seller_sql);

?>
