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
$item_name = $_POST['itemname'];       //get item name from name input field
$seller_name = $_POST['sellername'];   
$description = $_POST['itemdescription'];
$category = $_POST['itemcategory'];
$price = $_POST['startingprice'];
$exp_date = $_POST['expirationdate'];

//Gonna see if I can pull current date into $posted_date variable

$seller_sql = "INSERT INTO Seller (name) VALUES ('$seller_name')";

if ($conn->query($seller_sql) === TRUE) {
	echo "New seller added \n";
	$last_id = $conn->insert_id;
}else {
	echo "Error: " . $seller_sql . '\n' . $conn->error;
}	

$categoryID_sql = "SELECT C.id
				   FROM Category C
				   WHERE C.name = '$category'";


$item_sql = "INSERT INTO Item (name, price, seller_id, description, exp_date, category_id)
			 VALUES ('$item_name', '$price', '$last_id', '$description', '$exp_date', $conn->query($categoryID_sql))";



if ($conn->query($item_sql) === TRUE) {
	echo "New Game added \n";
}else {
	echo "Error: " . $item_sql . '\n' . $conn->error;
}	


?>