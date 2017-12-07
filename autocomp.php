 <?php  

$username = "sjs4025";
$password = "qweqaz!234567";
$server = "classroom.cs.unc.edu";
$database = "sjs4025db";


 $connect = mysqli_connect($server, $username, $password, $database);  

/*if ($connect->connect_error) {
      die("Connection failed: " . $conn->connect_error);
}*/

 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM Item WHERE name LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
        while($row = mysqli_fetch_array($result)) 
        {  
            $output .= '<li>'.$row["name"].'</li>';
        }  
      }  
      else  
      {  
        $output .= '<li>Item not found</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?> 