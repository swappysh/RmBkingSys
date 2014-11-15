<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Form</title>
    </head>
    <body>
        <form name = "Login Form"  onsubmit="return validateForm()" method = "post"  action = '' >
            <label>User Name:<input type = "text" name = "user_name" maxlength = 50 /></label>
            <label>Password:<input type="password" name="password" /></label>
            <input type="button" name="login" value="Login"/>
            <input type="button" name="cancel" value="Cancel"/>
            <input type="button" name="sign_up" value="Sign Up" />
            <a href="" >Forgot User Name or Password?</a>
        </form>
    </body>
</html>
