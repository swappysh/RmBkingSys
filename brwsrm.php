<?php
	require_once 'cnntdb.php';

	connect();

	$sql = "SELECT * FROM Room";
	$result = $conn->query($sql);
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
                        <li class = "active"><a href = "brwsrm.php">Room Availability</a></li>
                        <li><a href = "upmingents.php">Upcoming Events</a></li>
                        <li><a href = "">Contact</a></li>
                        <li><a href = "">FAQ</a></li>
                        <li><a href = "">About Us</a></li>
                    </ul>
                    <ul class = "nav navbar-nav navbar-right">
                        <?php
                            if (!isset( $_COOKIE['user'] )) {
                                echo "<li>"
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

        <div class = "container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Room Name</th>
                        <th>Room Type</th>
                        <th>Room Capacity</th>
                        <th>Room Details</th>
                        <th>Room Price</th>
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
                                    ."<td>".$row['Rprice']."</td></tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>

	</body>

</html>