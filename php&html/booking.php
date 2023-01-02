<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Pool Villa</title>
        <style>
            body{
                background-color: rgba(151, 144, 219, 0.85);
            }
            h1{
                border-radius: 15px;
                width: 900px;
                height: 90px;
                background-color: rgba(50, 41, 131, 0.85);
            }
        </style>
    </head>
    <body>
        <center>
            <h1 style="font-size: 65px;font-family:  Arial; color: rgb(255, 250, 227);">
                booking  
            </h1>
        </center>
        <form action="insertcustomer.php" method="POST">
            <p style="font-size: 20px;font-family:  Arial; color: rgb(119, 37, 94);">
                <label for="phone">Phone :</label>
                <input type="text" name="phone" id="phone">
            </p>
            <p style="font-size: 20px;font-family:  Arial; color: rgb(17, 65, 50);">
                Select your Pool Villa :
                <select id="poolvilla_id" name="poolvilla_id">
                    <option value="1">Exclusive Type J Pool Villa </option>
                    <option value="2">Sky Breeze Pool Villa </option>
                    <option value="3">Moonlight Pool Villa </option>
                    <option value="4">Exclusive Type G Pool Villa </option>
                </select>
            </p>
            <p style="font-size: 20px;font-family:  Arial; color: rgb(119, 37, 94);">
                <label for="checkin_date">Check in :</label>
                <input type="date" id="checkin_date" name="checkin_date"><br><br>

                <label for="checkout_date">Check out :</label>
                <input type="date" id="checkout_date" name="checkout_date"><br><br>   

                <label for="pay_date">pay :</label>
                <input type="date" id="pay_date" name="pay_date">
                :: โปรดชำระก่อนเข้าพัก 2-3 วัน
            </p>
            
                <input type="submit" value="Next">
                <a href="register.php">Enter Personal information</a>
            </p>
                
        </form>
    </body>
</html>