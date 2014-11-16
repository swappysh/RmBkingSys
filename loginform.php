<?php

if ( isset($_COOKIE['user']) ) {
    require_once("url.php");
    header("Location: $rootURL/index.php");
}

if ( isset($_POST['login']) ) {

    require_once("cnntdb.php");
    require_once("url.php");

    connect();

    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM User WHERE Uname = '$user_name' AND Password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        setcookie("user", $user_name, time() + 60*60);
        header("Location: $rootURL/index.php");
    }
    else
        echo "Wrong User Name or Password";
}
?>

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
        <form name = "Login Form"  onsubmit="return validateForm()" method = "post"  action = 'loginform.php' >
            <label>User Name:<input type = "text" name = "user_name" maxlength = 50 /></label><br>
            <label>Password:<input type="password" name="password" /></label><br>
            <input type="submit" name="login" value="login"/>
        </form>
        <a href="forgot.php" >Forgot User Name or Password?</a>
        <a href="index.php" >
        	<div class = "button">
        		<button name="cancel" value="cancel">Cancel</button>
        	</div>
        </a>
        <a href="signupform.php">
        	<div class = "button">
        		<button name="sign_up" value="sign_up">Sign Up</button>
        	</div>
        </a>
    </body>
</html>