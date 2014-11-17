<html>
<head>
	<title></title>
</head>

<body>
	<a href = "#">Home</a>
	<?php
	if (!isset( $_COOKIE['user'] )) {
		echo "<a href = \"loginform.php\">Login / My Account</a>";
	}
	else echo "Hey ".$_COOKIE['user']."!";
	?>
	<a href = "reservation_form1.php">Reservation</a>
	<a href = "brwsrm.php">Room Availability</a>
	<a href = "">Upcoming Events</a>
	<a href = "">Contact</a>
	<a href = "">FAQ</a>
	<a href = "">About Us</a>
</body>
</html>