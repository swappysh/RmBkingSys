<?php

    $check = 1;
	
    if ( isset($_POST['submit']) ) {
		
		require_once("../url.php");

		if( $_POST['npassword'] == $_POST['cnpassword'] ) {
			require_once '../cnntdb.php';
			
			connect();

			$sql = "SELECT Uname FROM User Where Password = '".md5($_POST['opassword'])."'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				$sql = "UPDATE User SET Password = '".md5($_POST['npassword'])."' WHERE Uname = '".$_COOKIE['user']."'";
                $conn->query($sql);
                header("Location: $rootURL/index.php");
			}
            else
                $check = 2;
		}
		else {
    			$check = 0;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../dist/css/RmBkingSys.css">
  <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"></head>

<body>

    <!--Navigation Bar-->
    <nav class = "navbar navbar-default">
        <div class = "container-fluid">
            <div class = "navbar-header">
                <a class = "navbar-brand" href="../index.php">RmBkingSys</a>
            </div>
            <div>
                <ul class = "nav navbar-nav">
                    <li><a href = "../index.php">Home</a></li>
                    <li><a href = "../reservation_form1.php">Reservation</a></li>
                    <li><a href = "../brwsrm.php">Room Availability</a></li>
                    <li><a href = "../upmingents.php">Upcoming Events</a></li>
                    <li><a href = "../index.php#cntctus">Contact</a></li>
                    <li><a href = "../index.php#faq">FAQ</a></li>
                    <li><a href = "../index.php#about">About Us</a></li>
                </ul>
                <ul class = "nav navbar-nav navbar-right">
                    <?php
                        if (!isset( $_COOKIE['root_user'] )) {
                            echo "<li>"
                                ."<a href = \"../root_user/rtloginform.php\">Admin Login</a></li>";
                        }
                        else echo "<li class=\"dropdown\">"
                                    ."<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">Admin <span class=\"caret\"></span></a>"
                                    ."<ul class=\"dropdown-menu\">"
                                            ."<li><a href=\"../root_user/adrm.php\">Add Room</a></li>"
                                            ."<li><a href=\"../root_user/delrm.php\">Delete Room</a></li>"
                                            ."<li><a href=\"../root_user/rmresvion.php\">Cancel Reservation</a></li>"
                                            ."<li><a href = \"../root_user/rmuser.php\">Remove User</a></li>"
                                            ."<li><a href=\"../root_user/rtlogout.php\">Log Out</a></li>"
                                        ."</ul>"
                                    ."</li>";
                    ?>

                    <?php
                        if (!isset( $_COOKIE['user'] )) {
                            echo "<li>"
                                ."<a href = \"../loginform.php\">Login</a></li>";
                        }
                        else echo "<li class=\"dropdown\">"
                                    ."<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">My Account <span class=\"caret\"></span></a>"
                                    ."<ul class=\"dropdown-menu\">"
                                            ."<li><a href=\"shwple.php\">Show Profile</a></li>"
                                            ."<li class = \"active\"><a href=\"#\">Edit</a></li>"
                                            ."<li><a href=\"bkinghtry.php\">Booking History</a></li>"
                                            ."<li><a href=\"logout.php\">Log Out</a></li>"
                                        ."</ul>"
                                    ."</li>";
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!--Page Content-->

    <!--Form-->
    <div class = "container">
        <form role = "form" action = "chnpass.php" method = "post">
            <div class = "form-group">
                <label></label>
                <input type = "password" name = "opassword" placeholder = "Old Password" class = "form-control"/>
            </div>
            <div class = "form-group">
                <label></label>
                <input type = "password" name = "npassword" placeholder = "New Password" class = "form-control"/>
            </div>
            <div class = "form-group">
                <label></label>
                <input type = "password" name = "cnpassword" placeholder = "Check New Password" class = "form-control"/>
            </div>
            <input type = "submit" value = "Submit" name = "submit" class = "btn btn-default"/>
        </form>
    </div>

    <?php
        if ($check == 0) {
            echo "<br><div class = \"container\"><div class = \"alert alert-danger\" role = \"alert\">Retype New Password</div></div>";
        }
        elseif ($check == 2) {
            echo "<br><div class = \"container\"><div class = \"alert alert-danger\" role = \"alert\">Retype Old Password</div></div>";
        }
    ?>

    <!--Javascript files-->
    <script src="../dist/js/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    </body>
</html>