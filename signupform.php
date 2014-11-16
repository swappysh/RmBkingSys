<?php

if ( isset($_COOKIE['user']) ) {
    require_once("url.php");
    header("Location: $rootURL/index.php");
}

if ( isset($_POST['submit']) ) {

    require_once("cnntdb.php");
    require_once("url.php");

    connect();

    $user_name =$_POST['user_name'];
    $f_name =$_POST['f_name'];
    $l_name =$_POST['l_name'];
    $org =$_POST['org'];
    $email =$_POST['email'];
    $mob_num =$_POST['mob_num'];
    $password =$_POST['password'];

    $sql = "INSERT INTO User VALUES ('$user_name', '$f_name', '$l_name', '$org', '$email', '$mob_num', '$password')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: $rootURL/index.php");
    } else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Error: <br>".mysqli_error($conn)."</div>";
        }
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
        <title>Sign Up From</title>
    </head>
    <body>
        <form name = "Sign Up Form"  onsubmit="return validateForm()" method = "post"  action = 'signupform.php' >
            <label>User Name:<input type = "text" name = "user_name" maxlength = 50 /></label><br>
            <label>Password:<input type="password" name="password" /></label><br>
            <label>Confirm Password:<input type="password" name="confirm_password" /></label><br>
            <label>First Name:<input type = "text" name = "f_name" maxlength = 50 /></label><br>
            <label>Last Name:<input type = "text" name = "l_name" maxlength = 50 /></label><br>
            <label>Organization:<input type = "text" name = "org" maxlength = 100 /></label><br>
            <label>eMail:<input type = "email" name = "email" /></label><br>
            <label>Confirm eMail:<input type = "email" name = "confirm_email" /></label><br>
            <label>Mobile Number:<input type="text" name="mob_num" /></label><br>
            <input type="submit" name="submit" value="submit"/>
        </form>
        <a href = "index.php">
        	<div class = "button">
                <button name = "cancel" value = "Cancel">Cancel</button>
        	</div>
        </a>
    </body>
</html>