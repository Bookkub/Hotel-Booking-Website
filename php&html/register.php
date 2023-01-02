<?php

    session_start();

    require_once "connection.php";

    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $user_check = "SELECT * FROM user WHERE user_id = '?' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);

        $query = "INSERT INTO user(name, phone, email)VALUE ('$name','$phone','$email')";
            $result = mysqli_query($conn, $query);
            if($result){
                $_SESSION['success'] = "Insert user successfully";
                header("Location: booking.php");
            }
            else{
                $_SESSION['error'] = "Something went wrong";
                header("Location: index.php");
            }

    }


?>

<!DOCTYPE html>
<html Lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="name">Name</label>
    <input type="text" name="name" placeholder="Enter your Name" required>
    <br><br>
    <label for="phone">Phone</label>
    <input type="text" name="phone" placeholder="Enter your phone number" required>
    <br><br>
    <label for="email">E-mail</label>
    <input type="text" name="email" placeholder="Enter your Email" required>
    <br><br>
    <input type="submit" name="submit" value="Submit">

</form>
    <br>
    <a href="booking.php">Go Back</a>
</body>
</html>