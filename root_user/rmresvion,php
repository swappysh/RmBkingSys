<?php

require_once '../cnntdb.php';

connect();

$sql = "SELECT * FROM BkingDetail WHERE Status = 'active'";

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
                    <li><a href = "../index.php">Home</a></li>
                    <li class = "active"><a href = "#">Reservation</a></li>
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
                </ul>
            </div>
        </div>
    </nav>

    <!--Page Content-->
        
    <div class = "container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Room Name</th>
                    <th>Booked from date</th>
                    <th>Booked to date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class = \"clickableRow\" data-url = \"rrmresvion.php?Uname=".$row['Uname']."&Rname=".$row['Rname']."&fdate=".$row['fdate']."\" >
                        	<td>".$row['Uname']."</td>"
                            ."<td>".$row['Rname']."</td>"
                            ."<td>".$row['fdate']."</td>"
                            ."<td>".$row['tdate']."</td></tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!--JavaScript Files-->
    <script src="../dist/js/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".clickableRow").click(function() {
                window.document.location = $(this).data("url");
            });
        });
    </script>
</body>
</html>