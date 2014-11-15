<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Checkout Form</title>
    </head>
    <body>
        <form name = "Checkout Form"  onsubmit="return validateForm()" method = "post"  action = '' >
            <label>Payment Options:
                <select name="payment">
                    <option>Debit Card</option>
                    <option>Credit Card</option>
                    <option>Net Banking</option>
                    <option>Cash in Person</option>
                </select>
            </label>
            <input type="button" name="pay" value="Pay"/>
            <input type="button" name="back" value="Back"/>
            <input type="button" name="cancel" value="Cancel"/>
        </form>
    </body>
</html>
