<?php 

require_once('orm/Mealtracker.php');

// $path_components = explode('/', $_SERVER['PATH_INFO']);
//echo "($path_components[0])"; exit;
 
 $meal = $_POST['meal'];
 $item = $_POST['item'];
 $calories = $_POST['calories'];
 $carbs = $_POST['carbs'];
 $protein = $_POST['protein'];
 $fat = $_POST['fat'];
 
 
if ($_SERVER['REQUEST_METHOD'] == "GET"){
	print "GOT HERE";
	$result = Mealtracker::getSums();
	$row = $result->fetch_assoc();
	print "<tr><td>".$row['calories']."</td><td>".$row['carbs']."</td><td>".$row['protein']."</td><td>".$row['fat']."</td></tr>";
}
else if ($_SERVER['REQUEST_METHOD'] == "POST"){
	$new_mealtracker = Mealtracker::create($meal, $item, $calories, $carbs, $protein, $fat);
	print "<tr><td>$meal</td><td>$item</td><td>$calories</td><td>$carbs</td><td>$protein</td><td>$fat</td></tr>";
	
}
else{
	
}

?>