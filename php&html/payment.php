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
                payment 
            </h1>
        </center>
        <form action="insertpayment.php" method="POST">
            <p style="font-size: 20px;font-family:  Arial; color: rgb(17, 65, 50);">
                <label for="phone">Phone :</label>
                <input type="text" name="phone" id="phone">
            </p>
            <p style="font-size: 20px;font-family:  Arial; color: rgb(17, 65, 50);">
                Select your Payment Type :
                <select id="payment_type" name="payment_type">
                    <option value="credit card">Credit card </option>
                    <option value="Paypal">Paypal </option>
                </select>
            </p>
            <p style="font-size: 20px;font-family:  Arial; color: rgb(17, 65, 50);">
                Select your Payment Status :
                <select id="pay_status" name="pay_status">
                    <option value="paid">ชำระเงินเรียบร้อย</option>
                    <option value="cancel">ขอยกเลิกการจอง </option>
                </select>
            </p>
            
            <p>
                <input type="submit" value="Next">
                <a href="payment.php"></a>
            </p>
                
        </form>
    </body>
</html>