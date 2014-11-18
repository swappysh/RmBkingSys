<?php
    require_once 'cnntdb.php';

    connect();

    $sql = "SELECT Uname, Rname, fdate FROM BkingDetail WHERE tdate < '".date('Y-m-d')."' AND status = 'active'";

    if ( $result = $conn->query($sql) ) {
        while ( $row = $result->fetch_assoc() ) {
            $sql = "UPDATE BkingDetail SET Status = 'inactive' WHERE Uname = '".$row['Uname']."' AND Rname = '".$row['Rname']."' AND fdate = '".$row['fdate']."'";
            $conn->query($sql);
        }
    }
    else 
        echo "Error: ".$conn->error ;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="dist/css/RmBkingSys.css">
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
                    <li class = "active"><a href = "#">Home</a></li>
                    <li><a href = "reservation_form1.php">Reservation</a></li>
                    <li><a href = "brwsrm.php">Room Availability</a></li>
                    <li><a href = "upmingents.php">Upcoming Events</a></li>
                    <li><a href = "#cntctus">Contact</a></li>
                    <li><a href = "#faq">FAQ</a></li>
                    <li><a href = "#about">About Us</a></li>
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

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <span class="name">RmBkingSys</span>
                        <span class="skills">Book your Event</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class = "container-fluid" style = "background-color: green; height: 20px"></div>
    <br><br><br><br>

    <!--Contact Us-->
    <div class = "container" id = "cntctus">
        <div class="row">
            <h1 class = "">Contact Us:</h1>
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

    <div class = "container-fluid" style = "background-color: green; height: 20px"></div>
    <br><br><br><br>

    <!--FAQ-->
    <div class="container" id = "faq">
        <h2>FAQ'S:</h2>
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">How can I cancel the Booking?</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">Sorry! Still even I don't know that!!!</div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">How can I see my Booking History?</a>
                    </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">Sorry! Still even I don't know that!!!</div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">How to book a room?</a>
                    </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">Click on the 'Reservation' tab and follow the instructions in that page and proceed to book a room.</div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">How can I edit my User details?</a>
                    </h4>
                </div>
                <div id="collapse4" class="panel-collapse collapse">
                    <div class="panel-body">First Login to your account. Then Click on 'My Account' tab in the top-right corner and select 'Edit' in the drop down menu.</div>
                </div>
            </div>
        </div> 
    </div>

    <br><br>
    <div class = "container-fluid" style = "background-color: green; height: 20px"></div>
    <br><br><br><br>

    <!--About Us-->
    <div class = "container" id = "about">
        <h2>About Us:</h2>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="jumbotron">
                <h4 class="text-justify">
                    Nestled in the Sivalik Range of the Himalayas, away from the bustle of the metropolis, a new abode of learning has germinated. A few hours before the Himalayan resort Kullu in Himachal Pradesh, once considered "the end of the habitable world", the youngest IIT is coming up. The location is the forested hills of Kamand on the banks of the Uhl, a tributary of River Beas. The historic town Mandi is 14 km away.
                </h4>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="jumbotron">
                    <h4 class="text-justify">
                    Indian Institute of Technology Mandi (IIT Mandi) is an engineering and technology higher education institute located in Mandi. It is one of the eight new Indian Institutes of Technology (IITs) established by the Ministry of Human Resource Development, Government of India under The Institutes of Technology (Amendment) Act, 2011 which declares these eight IITs as well as the conversion of Institute of Technology, Banaras Hindu University to IIT.[1] The Act was passed in the Lok Sabha on 24 March 2011[2] and by the Rajya Sabha on 30 April 2012.[3]<br><br>
                    IIT Mandi was mentored by IIT Roorkee, which hosted the first batch of students. IIT Mandi's permanent campus (about 12 km from historic city of Mandi) is under construction along Uhl River (a tributary of River Beas) at Kamand, Mandi. The institute admits students into various B.Tech., M.S, and Ph.D. programs (as of 2012). Timothy A. Gonsalves joined as the first Director of IIT Mandi on 15 January 2010 and R. C. Sawhney served as the first Registrar of IIT Mandi.[4]
                </h4>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>

    <!--Javascript Files-->
    <script src="dist/js/jquery.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>