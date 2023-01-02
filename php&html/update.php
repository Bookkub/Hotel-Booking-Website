<?php
require_once "config.php";
$name = $phone = $email = "";
$name_err = $phone_err = $email_err = "";
if(isset($_POST["user_id"]) && !empty($_POST["user_id"])){
    $id = $_POST["user_id"];
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Zก-ฮ''\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    $input_phone = trim($_POST["phone"]);
    if(empty($input_phone)){
        $phone_err = "Please enter phone number.";     
    } else{
        $phone = $input_phone;
    }
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter E-mail.";     
    } 
    else{
        $email = $input_email;
    }

    if(empty($name_err) && empty($phone_err) && empty($email_err)){
        $sql = "UPDATE user SET name=?, phone=?, email=? WHERE user_id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sssi", $param_name, $param_phone, $param_email, $param_id);
            $param_name = $name;
            $param_phone = $phone;
            $param_email = $email;
            $param_id = $id;
            
            if(mysqli_stmt_execute($stmt)){
                header("location: customerdata.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($link);
} else{
    if(isset($_GET["user_id"]) && !empty(trim($_GET["user_id"]))){
        $id =  trim($_GET["user_id"]);
        
        $sql = "SELECT * FROM user WHERE user_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            $param_id = $id;
            
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    $name = $row["name"];
                    $phone = $row["phone"];
                    $email = $row["email"];
                } else{
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        
        mysqli_stmt_close($stmt);
        
        mysqli_close($link);
    }  else{
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
    <h2>Update Customer data</h2>
    <p>Please edit the input values and submit to update data.</p>
    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
        <p><label>Name</label></p>
        <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
        <span><?php echo $name_err;?></span>
        <p><label>Phone</label></p>
        <textarea name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>"><?php echo $phone; ?></textarea>
        <span><?php echo $phone_err;?></span>
        <p><label>E-mail</label></p>
        <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
        <span><?php echo $email_err;?></span>
    <p>
        <input type="hidden" name="user_id" value="<?php echo $id; ?>"/>
        <br><br>
        <input type="submit" value="Submit">
        <a href="customerdata.php">Cancel</a>
    </p>
    </form>
</body>
</html>