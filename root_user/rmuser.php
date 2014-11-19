<?php

    require_once '../cnntdb.php';

    connect();

	if ( isset($_POST['submit']) ) {
		
        $sql = "DELETE FROM User WHERE Uname = '".$_POST['Uname']."'";
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
                        <li><a href = "index.php">Home</a></li>
                        <li><a href = "reservation_form1.php">Reservation</a></li>
                        <li><a href = "brwsrm.php">Room Availability</a></li>
                        <li><a href = "upmingents.php">Upcoming Events</a></li>
                        <li><a href = "contact.php">Contact</a></li>
                        <li><a href = "faq.php">FAQ</a></li>
                        <li><a href = "about.php">About Us</a></li>
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
            <form role = "form" method = "post"  action = 'rmuser.php' >
                <div class = "form-group">
                    <label>User Name:</label>
                    <select name="Uname" class = "form-control">
                    <?php
                        $sql = "SELECT Uname FROM User";
                        $result = $conn->query($sql);

                        while ( $row = $result->fetch_assoc() ) {
                            echo "<option>".$row["Uname"]."</option>";
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