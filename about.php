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
                    <li><a href = "contact.php">Contact</a></li>
                    <li><a href = "faq.php">FAQ</a></li>
                    <li class = "active"><a href = "#">About Us</a></li>
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
    
	
	<script src="dist/js/jquery.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>