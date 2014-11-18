<?php

    require_once 'url.php';

    session_start();
        
    #To check whether user is logined or not
    if (!isset($_COOKIE['user'])) {
        header("Location: $rootURL/loginform.php");
    }

    #To check whether the session is working or not
    if ( !isset($_SESSION['f_date']) ) {
        require_once 'url.php';
        header("Location: $rootURL/index.php");
    }

    #To act upon when form is clicked
    if (isset($_POST['pay'])) {

        require_once 'cnntdb.php';

        connect();

        $Uname = $_COOKIE['user'];
        $fdate = $_SESSION['f_date'];
        $tdate = $_SESSION['t_date'];
        $Rname = $_SESSION['Rname'];

        if (!$conn) {
			die("<div class=\"alert alert-danger\" role=\"alert\">Connection failed: ".mysqli_connect_error()."</div>");
		}

        $sql = "INSERT INTO BkingDetail VALUES ('$Uname' ,'$Rname' ,'active' ,'$fdate' ,'$tdate')";
        $result = $conn->query($sql);

        if($result){
     		header("Location: $rootURL/dstryssn.php");
     	}
     	else echo "'$Uname'".$conn->error;
    }
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

    <!--Page Content-->
    	<div class = "container">
        	<form role = "form" name = "Checkout Form"  onsubmit="return validateForm()" method = "post"  action = 'reservation_form4.php' >
                <div class = "form-group">
                    <label>Payment Options:</label>
                	<select name="payment" class = "form-control">
                    	<option>Debit Card</option>
                    	<option>Credit Card</option>
                    	<option>Net Banking</option>
                    	<option>Cash in Person</option>
                	</select>
                </div>
                <input type="submit" name="pay" value="Pay" class = "btn btn-default"/>
            </form>
        </div>

        <div class = "container">
            <br><a href = "reservation_form1.php" class = "btn btn-default">Back</a>
            <a href = "index.php" class = "btn btn-default">Cancel</a>
        </div>
        </form>

        <!--JavaScript Files-->
        <script src="dist/js/jquery.min.js"></script>
        <script src="dist/js/bootstrap.min.js"></script>
    </body>
</html>
