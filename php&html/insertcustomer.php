<?php
    require_once "config.php";

        $phone = mysqli_real_escape_string($link, $_POST['phone']);
        $poolvilla_id = mysqli_real_escape_string($link, $_POST['poolvilla_id']);
        $checkin_date = mysqli_real_escape_string($link, $_POST['checkin_date']);
        $checkout_date = mysqli_real_escape_string($link, $_POST['checkout_date']);
        $pay_date = mysqli_real_escape_string($link, $_POST['pay_date']);

        $query_id = "SELECT user_id from user where phone = '$phone'";
        if(mysqli_query($link, $query_id)){
            $result = mysqli_query($link, $query_id);
            if(mysqli_num_rows($result) == 0)
            {
                echo "เบอร์นี้ยังไม่ลงทะเบียน กรุณาลงทะเบียน"."<br>";
                echo "<br>";
                echo "<a href='register.php'>Enter Personal information</a>";
            }
            else
            {
                $row = mysqli_fetch_array($result);
                $id = $row["user_id"];
                $sql_booking = "INSERT INTO Booking_details (user_id, poolvilla_id, checkin_date, checkout_date, pay_date) VALUES ('$id', '$poolvilla_id',  '$checkin_date', '$checkout_date', '$pay_date')";
                if(mysqli_query($link, $sql_booking)){
                    echo "<body>
                        <p style='font-size: 30px;'>
                            ขอบคุณสำหรับการจองที่พัก &#128079
                        </p>
                        <p style='font-size: 20px;'>
                            หากต้องการชำระเงินกดที่หน้าชำระเงิน
                        </p>
                            <a href='payment.php' class='button'>
                            ยืนยันหน้าชำระเงิน </a>
                            <a href='pj_menu.html' class='button'>
                            กลับสู่หน้าหลัก </a><br>
                        </body>";
                }
                else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                } 
            }
        }
        else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
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
                                .button{
                                        background-color: #95da97;
                                        border: none;
                                        color: rgb(119, 37, 94);;
                                        padding: 5px 15px;
                                        text-align: center;
                                        text-decoration: none;
                                        display: inline-block;
                                        font-size: 30px;
                                        margin: 4px 2px;
                                        cursor: pointer;
                                    }
                            </style>
                        </head>
                    </html>