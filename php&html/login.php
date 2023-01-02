<?php

    session_start();

    
    if(isset($_POST['username']))
    {
        include('connection.php');

        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordenc = md5($password);

        $query = "SELECT * from user where username = '$username' and password = '$passwordenc'";
        
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1)
        {
            $row = mysqli_fetch_array($result);

            $_SESSION['userid'] = $row['user_id'];
            $_SESSION['user'] = $row['name'];
            header("Location: pj_menu.html");
        }
        else{
            echo "<script>alert('Invalid Username or Password');window.location.href='index.php'</script>";
        }
    }
    else{
        header("Location: index.php");
    }