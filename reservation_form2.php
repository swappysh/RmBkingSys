<?php

session_start();

require_once 'cnntdb.php';

connect();

$_SESSION['f_date'] = $_POST['f_date'];
$_SESSION['t_date'] = $_POST['t_date'];

$f_date = $_POST['f_date'];
$t_date = $_POST['t_date'];
$r_type = $_POST['room_type'];
$r_capacity = $_POST['room_capacity'];

$sql = "SELECT Rname FROM BkingDetail WHERE ( (fdate >= '$f_date' AND fdate <= '$t_date') OR (tdate >= '$f_date' AND tdate <= '$t_date') ) OR ( ('$f_date' >= fdate AND '$f_date' <= tdate) OR ('$t_date' >= fdate AND '$t_date' <= tdate) ) AND Status = 'ACTIVE'";
$result = $conn->query($sql);
$i = 0;

$sql = "SELECT * FROM Room WHERE Rtype = '$r_type' AND Rcapacity = $r_capacity";

if ($result->num_rows > 0 ){
    $sql .= " AND Rname NOT IN (";
    while ($row = $result->fetch_assoc() ) {
        if ($i) {
            $sql .= ",";
        }
        $sql .= "'".$row['Rname']."'";
        $i++;
    }
    $sql .= ")";
}

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
        <form name = "Form2"  onsubmit="return validateForm()" method = "post"  action = '' >
            <div class = "form-group">
                <label>Sort By:</label>
                <select name="sort_by">
                    <option>option 1</option>
                </select>
            </div>
            <div class = "form-group">
                <label>Price Range:</label>
                <input type="checkbox" name="range" value="value1">Value 1
            </div>
            <input type="submit" name="submit" value="Submit" class = "btn btn-default" />
        </form>
        
        <br><a href="reservation_form1.php" class = "btn btn-default" >Back</a>

        <a href="index.php" class = "btn btn-default">Cancel</a>
    </div-->
        
    <div class = "container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Room Name</th>
                    <th>Room Type</th>
                    <th>Room Capacity</th>
                    <th>Room Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class = \"clickableRow\" data-url = \"reservation_form3.php?Rname=".$row['Rname']."\" ><td>".$row['Rname']."</td>"
                            ."<td>".$row['Rtype']."</td>"
                            ."<td>".$row['Rcapacity']."</td>"
                            ."<td>".$row['Rprice']."</td></tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!--JavaScript Files-->
    <script src="dist/js/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".clickableRow").click(function() {
                window.document.location = $(this).data("url");
            });
        });
    </script>
</body>
</html>