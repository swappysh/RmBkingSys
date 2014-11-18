<?php

$check = 1;

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
        setcookie("user", $user_name, time() + 60*60, '/');
        header("Location: $rootURL/index.php");
    }
    else
        $check = 0;
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
                        <li><a href = "">Contact</a></li>
                        <li><a href = "">FAQ</a></li>
                        <li><a href = "">About Us</a></li>
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
                                            ."<li><a href=\"#\">Delete Room</a></li>"
                                            ."<li><a href=\"#\">Cancel Reservation</a></li>"
                                            ."<li><a href = \"#\">Remove User</a></li>"
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
            <form role = "form" name = "Login_form"  onsubmit="return validateForm()" method = "post"  action = 'loginform.php' >
                <div class = "form-group">
                    <input type = "text" name = "user_name" class = "form-control" placeholder = "User Name" maxlength = 50 />
                </div>
                <div class = "form-group">
                    <input type="password" name="password" class = "form-control" placeholder = "Password" />
                </div>
                <div>
                    <button type="submit" name="login" class = "btn btn-default">LogIn</button>
                    <a href="forgot.php" class = "btn" style = "float:right; position:relative">Forgot User Name or Password?</a>
                </div>
            </form>
            <br>
            <a href="signupform.php">
        	   <div class = "button">
        		  <button name="sign_up" value="sign_up" class = "btn btn-info">Sign Up</button>
        	   </div>
            </a>

            <?php
                if (!$check) {
                    echo "<br><div class = \"alert alert-danger\" role = \"alert\">Wrong User Name or Password</div>";
                }
            ?>
        </div>

        <script src="dist/js/jquery.min.js"></script>
        <script src="dist/js/bootstrap.min.js"></script>
    </body>
</html>