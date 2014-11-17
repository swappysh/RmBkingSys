<?php
	require_once 'cnntdb.php';

	connect();

	$sql = "SELECT * FROM Room";
	$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

	<head>
		<title>Browse Rooms</title>
	</head>

	<body>
		<table>
			<tr>
				<th>Room Name</th>
				<th>Room Type</th>
				<th>Room Capacity</th>
				<th>Room Details</th>
				<th>Room Price</th>
			</tr>
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
		</table>
	</body>

</html>