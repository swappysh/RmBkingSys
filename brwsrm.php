<?php
	require_once 'cnntdb.php';

	connect();

	$sql = "SELECT Room.Rname, Rtype, Rcapacity, Rdetails, Rprice, fdate, tdate FROM Room, BkingDetail WHERE Room.Rname = BkingDetail.Rname;";
	$result = $conn->query($sql);

	$sql = "SELECT * FROM Room WHERE Rname NOT IN (SELECT Room.Rname FROM Room, BkingDetail WHERE Room.Rname = BkingDetail.Rname)";
	$result1 = $conn->query($sql);
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
<<<<<<< HEAD
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
                    <li class = "active"><a href = "#">Room Availability</a></li>
                    <li><a href = "upmingents.php">Upcoming Events</a></li>
                    <li><a href = "index.php#cntctus">Contact</a></li>
                    <li><a href = "index.php#faq">FAQ</a></li>
                    <li><a href = "index.php#about">About Us</a></li>
                </ul>
                <ul class = "nav navbar-nav navbar-right">
=======
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
                        <li class = "active"><a href = "#">Room Availability</a></li>
                        <li><a href = "upmingents.php">Upcoming Events</a></li>
                        <li><a href = "index.php#cntctus">Contact</a></li>
                        <li><a href = "index.php#faq">FAQ</a></li>
                        <li><a href = "index.php#about">About Us</a></li>
                    </ul>
                    <ul class = "nav navbar-nav navbar-right">
>>>>>>> b58ecbd5ac3bdbe8a5e6c27eeb56362582d29223
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
                            echo "<li>"
                                ."<a href = \"loginform.php\">Login</a></li>";
                        }
                        else echo "<li class=\"dropdown\">"
                                    ."<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">My Account <span class=\"caret\"></span></a>"
                                    ."<ul class=\"dropdown-menu\">"
                                            ."<li><a href=\"My_Account/shwple.php\">Show Profile</a></li>"
                                            ."<li><a href=\"My_Account/edit.php\">Edit</a></li>"
                                            ."<li><a href=\"My_Account/bkinghtry.php\">Booking History</a></li>"
                                            ."<li><a href=\"My_Account/logout.php\">Log Out</a></li>"
                                        ."</ul>"
                                    ."</li>";
                    ?>
<<<<<<< HEAD
                </ul>
=======
                    </ul>
                </div>
>>>>>>> b58ecbd5ac3bdbe8a5e6c27eeb56362582d29223
            </div>
        </div>
    </nav>

        <div class = "container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Room Name</th>
                        <th>Room Type</th>
                        <th>Room Capacity</th>
                        <th>Room Details</th>
                        <th>Room Price</th>
                        <th>Booked from Date</th>
                        <th>Booked to Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>"
                                    ."<td>".$row['Rname']."</td>"
                                    ."<td>".$row['Rtype']."</td>"
                                    ."<td>".$row['Rcapacity']."</td>"
                                    ."<td>".$row['Rdetails']."</td>"
                                    ."<td>".$row['Rprice']."</td>"
                                    ."<td>".$row['fdate']."</td>"
                                    ."<td>".$row['tdate']."</td></tr>";
                            }
                        }
                        if ($result1->num_rows > 0) {
                            while ($row = $result1->fetch_assoc()) {
                                echo "<tr>"
                                    ."<td>".$row['Rname']."</td>"
                                    ."<td>".$row['Rtype']."</td>"
                                    ."<td>".$row['Rcapacity']."</td>"
                                    ."<td>".$row['Rdetails']."</td>"
                                    ."<td>".$row['Rprice']."</td>"
                                    ."<td>---</td>"
                                    ."<td>---</td></tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>

    <!--Javascript files-->
    <script src="dist/js/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
	</body>

</html>