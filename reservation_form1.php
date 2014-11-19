<?php

session_start();

require_once 'cnntdb.php';

connect();
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
                    <li class = "active"><a href = "#">Reservation</a></li>
                    <li><a href = "brwsrm.php">Room Availability</a></li>
                    <li><a href = "upmingents.php">Upcoming Events</a></li>
                    <li><a href = "index.php#cntctus">Contact</a></li>
                    <li><a href = "index.php#faq">FAQ</a></li>
                    <li><a href = "index.php#about">About Us</a></li>
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
                </ul>
            </div>
        </div>
    </nav>

    <!--Page Content-->

        <!--div class = "container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#</td>
                </tr>
            </tbody>
        </table>
    </div-->

    <div class = "container">
        <form role = "form" name = "Form1"  onsubmit="return validateForm()" method = "post"  action = 'reservation_form2.php' >
            <div class = "form-group">
                <label>Room Type:</label>
                <select name="room_type" class = "form-control">
                    <?php
                        $sql = "SELECT DISTINCT Rtype FROM Room";
                        $result = $conn->query($sql);

                        while ( $row = $result->fetch_assoc() ) {
                            echo "<option>".$row["Rtype"]."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class = "form-group">
                <label>Room Capacity:</label>
                <select name="room_capacity" class = "form-control">
                    <?php
                        $sql = "SELECT DISTINCT Rcapacity FROM Room";
                        $result = $conn->query($sql);

                        while ( $row = $result->fetch_assoc() ) {
                            echo "<option>".$row["Rcapacity"]."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class = "form-group">
                <label>From Date:</label>
                <input type ="date" name = "f_date" placeholder="yyyy-mm-dd" class = "form-control" required/>
            </div>
            <div class = "form-group">
                <label>To Date:</label>
                <input type ="date" name = "t_date" placeholder="yyyy-mm-dd" class = "form-control" required/>
            </div>
            <input type="submit" name="proceed" class = "btn btn-default" value="Proceed"/>
            <a href="index.php" class = "btn btn-default" >Cancel</a>
        </form>
    </div>
    
    <!--JavaScript Files-->
    <script src="dist/js/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
</body>
</html>