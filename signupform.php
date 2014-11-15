<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up From</title>
    </head>
    <body>
        <form name = "Sign Up Form"  onsubmit="return validateForm()" method = "post"  action = '' >
            <label>User Name:<input type = "text" name = "user_name" maxlength = 50 /></label>
            <label>Password:<input type="password" name="password" /></label>
            <label>Confirm Password:<input type="confirm_password" name="password" /></label>
            <label>First Name:<input type = "text" name = "f_name" maxlength = 50 /></label>
            <label>Last Name:<input type = "text" name = "l_name" maxlength = 50 /></label>
            <label>Organization:<input type = "text" name = "org" maxlength = 100 /></label>
            <label>eMail:<input type = "email" name = "email" /></label>
            <label>Confirm eMail:<input type = "email" name = "confirm_email" /></label>
            <label>Mobile Number:<input type="text" name="mob_num" /></label>
            <input type="button" name="sumbit" value="Submit"/>
            <input type="button" name="cancel" value="Cancel"/>
        </form>
    </body>
</html>
