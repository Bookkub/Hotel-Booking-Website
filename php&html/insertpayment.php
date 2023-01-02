<?php
    require_once "config.php";

    $phone = mysqli_real_escape_string($link, $_POST['phone']);
    $payment_type = mysqli_real_escape_string($link, $_POST['payment_type']);
    $pay_status = mysqli_real_escape_string($link, $_POST['pay_status']);
    

    $query_id = "SELECT booking_id from booking_details INNER join user using (user_id) where phone = '$phone'";
    if(mysqli_query($link, $query_id)){
        $result = mysqli_query($link, $query_id);
        if(mysqli_num_rows($result) == 0)
        {
            echo "เบอร์นี้ยังไม่ลงทะเบียน กรุณาลงทะเบียน."."<br>";
            echo "<a href='register.php'>Enter Personal information</a>";
        }
        else
        {
            while($row = mysqli_fetch_array($result))
            {
                $id = $row["booking_id"];
            }
            
            // $id = $link->insert_id;
            $sql_booking = "INSERT INTO Payment (booking_id, payment_type, pay_status) VALUES ('$id', '$payment_type', '$pay_status')";
            if(mysqli_query($link, $sql_booking)){
                echo "<body>
                    <p style='font-size: 30px;'>
                        ขอบคุณสำหรับการชำระเงิน &#128079
                    </p>
                    <p style='font-size: 20px;'>
                        ติดต่อสอบถาม รายละเอียดการเข้าพักเพิ่มเติมได้ที่ Line : @poolvilalala
                    </p>
                    <p>
                        <a href='pj_menu.html' class='button'>
                        กลับสู่หน้าหลัก </a>
                    </p>
                    </body>";
            }
            else{
                echo "ERROR: Could not able to execute $sql_booking. " . mysqli_error($link);
            } 
        }
    }
    else{
        echo "ERROR: Could not able to execute $sql_booking. " . mysqli_error($link);
    } 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Pool Villa</title>
        <style>
            body{
                background-color: rgb(199, 195, 236);
            }
        </style>
    </head>
    
</html>