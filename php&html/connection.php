<?php
    $conn = mysqli_connect("localhost","root","","project");

    if(!$conn)
    {
        die("Failed to connect to database ". mysql_error($conn));
    }
?>