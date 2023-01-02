<?php

    if(isset($_GET["user_id"]) && !empty(trim($_GET["user_id"]))){
        require_once "config.php";
        $id = trim($_GET['user_id']);
    $sql = "SELECT user_id,booking_id,poolvilla_id,checkin_date,checkout_date,pay_date,payment_type,pay_status from booking_details
    left join payment using(booking_id) where user_id = '$id'"; 
        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                echo '<table>';
                echo "<thead>";
                    echo "<tr>"; 
                    echo "<th>Poolvilla_id</th>"; 
                    echo "<th>Check-In Date</th>"; 
                    echo "<th>Check-Out Date</th>"; 
                    echo "<th>Pay Date</th>"; 
                    echo "<th>payment_type</th>"; 
                    echo "<th>pay_status</th>"; 
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>" . $row['poolvilla_id'] . "</td>"; 
                        echo "<td>" . $row['checkin_date'] . "</td>"; 
                        echo "<td>" . $row['checkout_date'] . "</td>"; 
                        echo "<td>" . $row['pay_date'] . "</td>";
                        echo "<td>" . $row['payment_type'] . "</td>";
                        echo "<td>" . $row['pay_status'] . "</td>";
                        echo "<td>";
                        echo '<a href="delete.php?booking_id='. $row['booking_id'] .'"<span>Delete</span></a>';
                        echo "</td>";
                        echo "</tr>";
                    }
                 echo "</tbody>";                            
                 echo "</table>";
                 mysqli_free_result($result); // Free result set
           } else{
                 echo "No records were found.";
              }
           } else{
                 echo "Something went wrong. Please try again.";
           }
        mysqli_close($link); 
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <p><a href="customerdata.php">Back</a></p>
</body>
</html>
