<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Customer Data</h2>
    <?php
        require_once "config.php"; 
        $sql = "SELECT * FROM user"; 
        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                echo '<table>';
                echo "<thead>";
                    echo "<tr>"; 
                    echo "<th>#</th>"; 
                    echo "<th>Name</th>"; 
                    echo "<th>Phone</th>"; 
                    echo "<th>Email</th>";  
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>" . $row['user_id'] . "</td>"; 
                        echo "<td>" . $row['name'] . "</td>"; 
                        echo "<td>" . $row['phone'] . "</td>"; 
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>";
                        echo '<a href="read.php?user_id=' . $row['user_id'] .'" <span>View</span></a>' . " ";
                        echo '<a href="update.php?user_id='. $row['user_id'] .'"<span>Update</span></a>' . " ";
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
    ?>
    
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <p><a href="adminpage.php">Back</a></p>
</body>
</html>

