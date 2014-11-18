<?php

if(isset($_POST['submit'])) {
    $check = 1;

    require_once '../cnntdb.php';

    connect();

    $Rname = $_POST['room_name'];
    $Rtype = $_POST['room_type'];
    $Rcapacity = $_POST['room_capacity'];
    $Rdetails = $_POST['room_details'];
    $Rprice = $_POST['room_price'];

    $sql = "INSERT INTO Room VALUES ('$Rname', '$Rtype', '$Rcapacity', '$Rdetails', $Rprice)";
    $result = $conn->query($sql);

    if ($result) {
    }
    else $check = 0;
}
?>

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
                <a class = "navbar-brand" href="../index.php">RmBkingSys</a>
            </div>
            <div>
                <ul class = "nav navbar-nav">
                    <li><a href = "../index.php">Home</a></li>
                    <li><a href = "../reservation_form1.php">Reservation</a></li>
                    <li><a href = "../brwsrm.php">Room Availability</a></li>
                    <li><a href = "../upmingents.php">Upcoming Events</a></li>
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
                                            ."<li class = \"active\"><a href=\"#p\">Add Room</a></li>"
                                            ."<li><a href=\"#\">Delete Room</a></li>"
                                            ."<li><a href=\"#\">Cancel Reservation</a></li>"
                                            ."<li><a href = \"#\">Remove User</a></li>"
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
                                            ."<li><a href=\"#\">Edit</a></li>"
                                            ."<li><a href=\"../My_Account/logout.php\">Log Out</a></li>"
                                        ."</ul>"
                                    ."</li>";
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!--Page Content-->
    <div class = "container">
        <form role = "form" name = "Form"  onsubmit="return validateForm()" method = "post"  action = 'adrm.php' >
            <div class = "form-group">
                <label>Room Name</label>
                <input type = "text" name = "room_name" placeholder = "Room Name" class = "form-control" required/>
            </div>
            <div class = "form-group">
                <label>Room Type</label>
                <input type = "text" name = "room_type" placeholder = "Room Type" class = "form-control" required/>
            </div>
            <div class = "form-group">
                <label>Room Capacity</label>
                <input type = "text" name = "room_capacity" placeholder = "Room Capacity" class = "form-control" required/>
            </div>
            <div class = "form-group">
                <label>Room Details</label>
                <input type = "text" name = "room_details" placeholder = "Room Details" class = "form-control" />
            </div>
            <div class = "form-group">
                <label>Room Price</label>
                <input type = "number" name = "room_price" placeholder = "Room Price" class = "form-control" min = "0" max = "50000" step = "10" required/>
            </div>
            <input type="submit" name="submit" value="Submit" class = "btn btn-default" />
        </form>
    </div>

    <div class = "container">
        <?php
            if (isset($_POST['submit'])) {
                if ($check) {
                    echo "<div class=\"alert alert-success\" role=\"alert\">New record created successfully</div>";
                }
                else
                    echo "<div class=\"alert alert-danger\" role=\"alert\">Change User Name</div>";
            }
        ?>
    </div>
	
	<script src="../dist/js/jquery.min.js"></script>
	<script src="../dist/js/bootstrap.min.js"></script>
</body>
</html>