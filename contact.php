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
                    <li><a href = "brwsrm.php">Room Availability</a></li>
                    <li><a href = "upmingents.php">Upcoming Events</a></li>
                    <li class = "active"><a href = "#">Contact</a></li>
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

    <!--Page Content-->
    <div class = "container-fluid">
        <h2>Contact Us:</h2>
        <div class="row">
        <div class="col-sm-4">
        <div class="jumbotron">
        <h3>The Registrar</h3>
        <h4>
        Registrar's Office<br>
        Indian Institute of Technology Mandi<br>
        Kamand Campus, VPO Kamand,<br>
        Distt. Mandi - 175005 Himachal Pradesh<br>
        India<br>
        Tel: +91 1905-300015<br>
        Fax: +91 01905-300009<br>
        Email: registrar[at]iitmandi.ac.in<br>
        </h4>
        </div>
        </div>
            
        <div class="col-sm-4">
        <div class="jumbotron">
        <h3>The Director</h3>
        <h4>
        Director's office Indian Institute of Technology Mandi<br>
        Kamand Campus, VPO Kamand,<br>
        Distt. Mandi - 175005 Himachal Pradesh<br>
        India<br>
        Tel: +91 1905-300001<br>
        Fax: +91 01905-300009<br>
        Email: diroffice[at]iitmandi.ac.in<br>
        </h4>
        </div>
        </div>
            
        <div class="col-sm-4">
        <div class="jumbotron">
        <h3>Swapnil Sharma</h3>
        <h4>
        Room No: 203<br>
        Suvalsar Hostel, IIT Mandi<br>
        Distt. Mandi - 175005 Himachal Pradesh<br>
        India<br>
        Tel: +91 9816936034<br>
        Fax: +91 9816936034<br>
        Email: b13234[at]students.iitmandi.ac.in<br>
        </h4>
        </div>
        </div>
            
        </div>
        
    </div>
	<script src="dist/js/jquery.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>