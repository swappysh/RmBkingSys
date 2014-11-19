<?php

    require_once '../cnntdb.php';

    connect();

	if ( isset($_POST['submit']) ) {
		
        $sql = "DELETE FROM Room WHERE Rname = '".$_POST['Rname']."'";
		$result = $conn->query($sql);
			
	    require_once("../url.php");
    	header("Location: $rootURL/index.php");
	}
?>

<!--HTML Page-->
<!DOCTYPE html>
    <html>
    <head>
        <title>Template</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
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
                                ."<a href = \"rtloginform.php\">Admin Login</a></li>";
                        }
                        else echo "<li class=\"dropdown\">"
                                    ."<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">Admin <span class=\"caret\"></span></a>"
                                    ."<ul class=\"dropdown-menu\">"
                                            ."<li><a href=\"adrm.php\">Add Room</a></li>"
                                            ."<li><a href=\"delrm.php\">Delete Room</a></li>"
                                            ."<li><a href=\"rmresvion.php\">Cancel Reservation</a></li>"
                                            ."<li><a href = \"rmuser.php\">Remove User</a></li>"
                                            ."<li><a href=\"rtlogout.php\">Log Out</a></li>"
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
                                            ."<li><a href=\"../My_Account/shwple.php\">Show Profile</a></li>"
                                            ."<li><a href=\"../My_Account/edit.php\">Edit</a></li>"
                                            ."<li><a href=\"../My_Account/bkinghtry.php\">Booking History</a></li>"
                                            ."<li><a href=\"../My_Account/logout.php\">Log Out</a></li>"
                                        ."</ul>"
                                    ."</li>";
                    ?>
            </div>
        </div>
    </nav>

        <!--Form-->
        <div class = "container">
            <form role = "form" method = "post"  action = 'delrm.php' >
                <div class = "form-group">
                    <label>User Name:</label>
                    <select name="Rname" class = "form-control">
                    <?php
                        $sql = "SELECT Rname FROM Room";
                        $result = $conn->query($sql);

                        while ( $row = $result->fetch_assoc() ) {
                            echo "<option>".$row["Rname"]."</option>";
                        }
                    ?>
                    </select>
                </div>
                <div>
                    <button type="submit" name="submit" class = "btn btn-default">Delete</button>
                </div>
            </form>
        </div>

        <!--Javascript Files-->
        <script src="../dist/js/jquery.min.js"></script>
        <script src="../dist/js/bootstrap.min.js"></script>
    </body>
</html>