<?php
    if ( isset($_POST['submit']) ) {
        require_once '../cnntdb.php';
        require_once("../url.php");

        connect();

        $sql = "UPDATE User SET Uname = '".$_POST['Uname']."' , Fname = '".$_POST['Fname']."' , Lname = '".$_POST['Lname']."' , Org = '".$_POST['Org']."' , Email = '".$_POST['Email']."' , Co_num = '".$_POST['Co_num']."' WHERE Uname = '".$_COOKIE['user']."'";

        $conn->query($sql);
        header("Location: $rootURL/index.php");    }
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
                <a class = "navbar-brand" href="index.php">RmBkingSys</a>
            </div>
            <div>
                <ul class = "nav navbar-nav">
                    <li><a href = "#">Home</a></li>
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
                                            ."<li><a href=\"edit.php\">Edit</a></li>"
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
    <div class = "container">
        <form role = "form" action = "edit.php" method = "post">
            <?php
    
                require_once '../cnntdb.php';

                connect();

                $sql = "SELECT * FROM User WHERE Uname = '".$_COOKIE['user']."'";

                if ($result = $conn->query($sql)) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                            <div class = \"form-group\">
                                <label>User Name:</label>
                                <input type = \"text\" name = \"Uname\" value = \"".$row['Uname']."\" class = \"form-control\"/>
                            </div>
                            <div class = \"form-group\">
                                <label>First Name:</label>
                                <input type = \"text\" name = \"Fname\" value = \"".$row['Fname']."\" class = \"form-control\"/>
                            </div>
                            <div class = \"form-group\">
                                <label>Last Name:</label>
                                <input type = \"text\" name = \"Lname\" value = \"".$row['Lname']."\" class = \"form-control\"/>
                            </div>
                            <div class = \"form-group\">
                                <label>Organization:</label>
                                <input type = \"text\" name = \"Org\" value = \"".$row['Org']."\" class = \"form-control\"/>
                            </div>
                            <div class = \"form-group\">
                                <label>Email:</label>
                                <input type = \"text\" name = \"Email\" value = \"".$row['Email']."\" class = \"form-control\"/>
                            </div>
                            <div class = \"form-group\">
                                <label>Contact Number</label>
                                <input type = \"text\" name = \"Co_num\" value = \"".$row['Co_num']."\" class = \"form-control\"/>
                            </div>";
                    }
                }
            ?>
            <input type = "submit" name = "submit" class = "btn btn-default" value = "Submit"/>
            <a href="chnpass.php" class = "btn btn-default">Change Password</a>
        </form>
    </div>

    <!--Javascript files-->
        <script src="dist/js/jquery.min.js"></script>
        <script src="dist/js/bootstrap.min.js"></script>
    </body>
</html>