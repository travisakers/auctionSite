<?php
$username = "sjs4025";
$password = "qweqaz!234567";
$server = "classroom.cs.unc.edu";
$database = "sjs4025db";

$conn = new mysqli($server, $username, $password, $database);
           if (!$conn) {
               die(mysql_error());
           }
           mysql_select_db("sjs4025db");
           $results = mysql_query("SELECT I.name as itemname, C.name as categoryname, MAX(B.bid_price) as bidprice , I.exp_date s expiration
FROM Bid B, Category C, Item I, User U
WHERE C.id = I.category_id AND B.item_id = I.id
GROUP BY I.id
ORDER BY COUNT(B.bid_price)
LIMIT 10");
           while($row = mysql_fetch_array($results)) {
           ?>
               <tr>
                   <td><?php echo $row['itemname']?></td>
                   <td><?php echo $row['categoryname']?></td>
                   <td><?php echo $row['bidprice']?></td>
                   <td><?php echo $row['expiration']?></td>
               </tr>
               <?php
            }
?>
