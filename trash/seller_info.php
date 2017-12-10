<?PHP
include 'ChromePhp.php';
ChromePhp::log('Hello console!');
$username = "sjs4025";
$password = "qweqaz!234567";
$server = "classroom.cs.unc.edu";
$database = "sjs4025db";
function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);
        
        echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}
debug_to_console("test");

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
}
 if( !empty($_POST['itemname']) ){
     
     $item_name = $_POST['itemname'];
     debug_to_console($item_name);
 }else{ debug_to_console($item_name);}
 if( !empty($_POST['sellername']) ){
     
     $seller_name = $_POST['sellername'];
     debug_to_console($seller_name);
 }else{ debug_to_console($item_name);}
  if( isset($_POST['itemdescription']) ){
     
     $description = $_POST['itemdescription'];
 }else{ echo "did not work";}
  if( isset($_POST['itemcategory']) ){
     
     $category = $_POST['itemcategory'];
 }else{ echo "itemcategory";}
  if( isset($_POST['expirationdate']) ){
     
     $exp_date = $_POST['expirationdate'];
 }else{ echo "itemcategory";}
  if( isset($_POST['startingprice']) ){
     
     $price = $_POST['startingprice'];
 }else{ echo "startingprice";}
 
  
       //get item name from name input field


//Gonna see if I can pull current date into $posted_date variable

$seller_sql = "INSERT INTO User (first) VALUES ('$seller_name')";

if ($conn->query($seller_sql) === TRUE) {
	echo "New seller added \n";
	$last_id = $conn->insert_id;
}else {
	echo "Error: " . $seller_sql . '\n' . $conn->error;
}	

$categoryID_sql = "SELECT id
				   FROM Category
				   WHERE name = '$category'";


$item_sql = "INSERT INTO Item (name, starting_price, seller_id, description, exp_date, category_id)
			 VALUES ('$item_name', '$price', '$last_id', '$description', '$exp_date', $conn->query($categoryID_sql))";



if ($conn->query($item_sql) === TRUE) {
	echo "New Game added \n";
}else {
	echo "Error: " . $item_sql . '\n' . $conn->error;
}	


?>