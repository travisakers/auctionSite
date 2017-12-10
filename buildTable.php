<?php
$username = "sjs4025";
$password = "qweqaz!234567";
$server = "classroom.cs.unc.edu";
$database = "sjs4025db";
$conn = new mysqli($server, $username, $password, $database);
           if (!$conn) {
               echo "connection died";
               die(mysql_error());
           }
           $mysqli->select_db("sjs4025db");
?>

         <table>
          <tr>
			<th>&nbsp;</th>
			<th>Item</th>
			<th>Category</th>
			<th>Current Bid</th>
			<th>End Date</th>
			<th>Want to Bid?</th>
		</tr>

            <?php
               while ($row = mysql_fetch_array($query)) {
               		echo "<tr>";
                   echo "<td><button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="right" data-content=".$row['itemdescription']."</button></td>";
                   echo "<td>".$row['itemname']."</td>";
                   echo "<td>".$row['seller']."</td>";
                   echo "<td>".$row['category']."</td>";
                   echo "<td>".$row['currentBid']."</td>";
                   echo "<td>".$row['expDate']."</td>";
                   echo "<td><input type="button" name= "button" value="Bid" data-href="bid1"></td>";
                   echo "</tr>";
               }

            ?>
        </table>