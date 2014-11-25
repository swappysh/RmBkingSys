<?php

$check = 1;

if ( isset($_COOKIE['user']) ) {
    require_once("url.php");
    header("Location: $rootURL/index.php");
}

if ( isset($_POST['submit']) ) {

	if ( ($_POST['password'] == $_POST['confirm_password']) && ($_POST['email'] == $_POST['confirm_email']) ) {

	    require_once("cnntdb.php");
	    require_once("url.php");

	    connect();

	    $user_name =$_POST['user_name'];
	    $f_name =$_POST['f_name'];
	    $l_name =$_POST['l_name'];
	    $org =$_POST['org'];
	    $email =$_POST['email'];
	    $mob_num =$_POST['mob_num'];

	    # Password encryption for security
	    $password = md5($_POST['password']);

	    $sql = "INSERT INTO User VALUES ('$user_name', '$f_name', '$l_name', '$org', '$email', $mob_num, '$password')";
    
	    if (mysqli_query($conn, $sql)) {
	 	   header("Location: $rootURL/index.php");
	    } else {
	            $check = 0;
	        }
    }
    else $check = 2;
}
?>


<!DOCTYPE html>
    <html>
    <head>
        <title>Template</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    </head>

    <body>
        <!--Navigation Bar-->
        <nav class = "navbar navbar-default">
            <div class = "container-fluid">
                <div class = "navbar-header">
                    <a class = "navbar-brand" href="index.php">RmBkingSys</a>
                </div>
                <div>
                    <ul class = "nav navbar-nav">
                        <li><a href = "index.php">Home</a></li>
                        <li><a href = "reservation_form1.php">Reservation</a></li>
                        <li><a href = "brwsrm.php">Room Availability</a></li>
                        <li><a href = "upmingents.php">Upcoming Events</a></li>
                        <li><a href = "index.php#cntctus">Contact</a></li>
                        <li><a href = "index.php#faq">FAQ</a></li>
                        <li><a href = "index.php#about">About Us</a></li>
                    </ul>
                    <ul class = "nav navbar-nav navbar-right">
                        <?php
                        if (!isset( $_COOKIE['root_user'] )) {
                            echo "<li>"
                                ."<a href = \"root_user/rtloginform.php\">Admin Login</a></li>";
                        }
                        else echo "<li class=\"dropdown\">"
                                    ."<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">Admin <span class=\"caret\"></span></a>"
                                    ."<ul class=\"dropdown-menu\">"
                                            ."<li><a href=\"root_user/adrm.php\">Add Room</a></li>"
                                            ."<li><a href=\"root_user/delrm.php\">Delete Room</a></li>"
                                            ."<li><a href=\"root_user/rmresvion.php\">Cancel Reservation</a></li>"
                                            ."<li><a href = \"root_user/rmuser.php\">Remove User</a></li>"
                                            ."<li><a href=\"root_user/rtlogout.php\">Log Out</a></li>"
                                        ."</ul>"
                                    ."</li>";
                    ?>

                        <?php
                            if (!isset( $_COOKIE['user'] )) {
                                echo "<li class = \"active\">"
                                    ."<a href = \"#\">Login</a></li>";
                            }
                            else echo "<li class=\"dropdown\">"
                                        ."<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">My Account <span class=\"caret\"></span></a>"
                                            ."<ul class=\"dropdown-menu\">"
                                                ."<li><a href=\"#\">Show Profile</a></li>"
                                                ."<li><a href=\"#\">Edit</a></li>"
                                                ."<li><a href=\"#\">Log Out</a></li>"
                                            ."</ul>"
                                        ."</li>";
                        ?>
                    </ul>
                </div>
            </div>
        </nav>

        <!--Form-->
        <div class = "container">
            <form role = "form" name = "Sign Up Form"  onsubmit="return validateForm()" method = "post"  action = 'signupform.php' >
                <div class = "form-group">
                    <input type = "text" name = "user_name" class = "form-control" placeholder = "User Name" maxlength = 50 required/>
                </div>
                <div class = "form-group">
                    <input type="password" name="password" class = "form-control" placeholder = "Password" required/>
                </div>
                <div class = "form-group">
                    <input type="password" name="confirm_password" class = "form-control" placeholder = "Confirm Password" required/>
                </div>
                <div class = "form-group row">
                    <div class = "col-sm-6">
                        <input type = "text" name = "f_name" maxlength = 50 class = "form-control" placeholder = "First Name" />
                    </div>
                    <div class = "col-sm-6">
                        <input type = "text" name = "l_name" maxlength = 50 class = "form-control" placeholder = "Last Name" />
                    </div>
                </div>
                <div class = "form-group">
                    <input type = "text" name = "org" class = "form-control" placeholder = "Organization" maxlength = 100 />
                </div>
                <div class = "form-group">
                    <input type = "email" name = "email" class = "form-control" placeholder = "Email" required/>
                </div>
                <div class = "form-group">
                    <input type = "email" name = "confirm_email" class = "form-control" placeholder = "Confirm Email" required/>
                </div>
                <div class = "form-group">
                    <input type="text" name="mob_num" class = "form-control" placeholder = "Mobile Number" required/>
                </div>
                <div>
                    <input type="submit" class = "btn btn-default" name="submit" value="Submit"/>
                    <a href = "index.php" class = "btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
        <?php
        if (!$check) {
            echo "<div class = \"container\"><div class=\"alert alert-danger\" role=\"alert\">Error: <br>".mysqli_error($conn)."</div></div>";
        }
        elseif ($check == 2) {
            echo "<div class = \"container\"><div class=\"alert alert-danger\" role=\"alert\">Doesn't Match</div></div>";
        }
        ?>
    </body>
</html>