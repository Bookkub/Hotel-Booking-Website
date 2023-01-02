<?php
if(isset($_POST["booking_id"]) && !empty($_POST["booking_id"])){
    require_once "config.php";
    $query = $_POST["booking_id"];
    $sql = "SELECT * FROM booking_details WHERE booking_id = '$query'"; 
    if($result = mysqli_query($link, $sql))
    {
        $row = mysqli_fetch_array($result);
        $user_id = $row['user_id'];
    }
    $sql = "DELETE FROM booking_details WHERE booking_id = ?";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_POST["booking_id"]);
        if(mysqli_stmt_execute($stmt)){
            header("location: read.php?user_id=$user_id");
            exit();
        } else{
            echo "Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else{
    if(empty(trim($_GET["booking_id"]))){
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Delete Customer data</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="booking_id" value="<?php echo trim($_GET["booking_id"]); ?>"/>
        <p>Are you sure you want to delete this data?</p>
        <p>
            <input type="submit" value="Yes">
            <a href="javascript:history.back()">No</a>
        </p>
    </form>
</body>
</html>