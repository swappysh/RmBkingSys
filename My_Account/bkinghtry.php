<?php
	require_once '../cnntdb.php';

	connect();

	$sql = "SELECT * FROM BkingDetail WHERE Uname = '".$_COOKIE['user']."'";
	$result = $conn->query($sql);
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
                    <a class = "navbar-brand" href="index.php">RmBkingSys</a>
                </div>
                <div>
                    <ul class = "nav navbar-nav">
                        <li><a href = "index.php">Home</a></li>
                        <li><a href = "reservation_form1.php">Reservation</a></li>
                        <li class = "active"><a href = "#">Room Availability</a></li>
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
                            echo "<li>"
                                ."<a href = \"loginform.php\">Login</a></li>";
                        }
                        else echo "<li class=\"dropdown\">"
                                    ."<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">My Account <span class=\"caret\"></span></a>"
                                    ."<ul class=\"dropdown-menu\">"
                                            ."<li><a href=\"My_Account/shwple.php\">Show Profile</a></li>"
                                            ."<li><a href=\"#\">Edit</a></li>"
                                            ."<li><a href=\"My_Account/logout.php\">Log Out</a></li>"
                                        ."</ul>"
                                    ."</li>";
                        ?>
                    </ul>
                </div>
            </div>
        </nav>


        <!--Table-->
        <div class = "container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Room Name</th>
                        <th>Status</th>
                        <th>Booked from Date</th>
                        <th>Booked to Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>"
                                    ."<td>".$row['Rname']."</td>"
                                    ."<td>".$row['Status']."</td>"
                                    ."<td>".$row['fdate']."</td>"
                                    ."<td>".$row['tdate']."</td></tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>

    <!--Javascript files-->
    <script src="../dist/js/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
	</body>

</html>