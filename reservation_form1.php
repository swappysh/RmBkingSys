<?php
require_once 'cnntdb.php';

connect();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Reservation Form</title>
    </head>
    <body>
        <form name = "Form1"  onsubmit="return validateForm()" method = "post"  action = 'reservation_form2.php' >
            <label>Room Type:
                <select name="room_type">
                	<?php
                	   $sql = "SELECT DISTINCT Rtype FROM Room";
                       $result = $conn->query($sql);

                       while ( $row = $result->fetch_assoc() ) {
                           echo "<option>".$row["Rtype"]."</option>";
                       }
                	?>
                </select>
            </label><br>
            <label>Room Capacity:
                <select name="room_capacity">
                    <?php
                       $sql = "SELECT DISTINCT Rcapacity FROM Room";
                       $result = $conn->query($sql);

                       while ( $row = $result->fetch_assoc() ) {
                           echo "<option>".$row["Rcapacity"]."</option>";
                       }
                    ?>
                </select>
            </label><br>
            <label>From Date:<input type ="date" name = "f_date" value="yyyy-mm-dd"/></label><br>
            <label>To Date:<input type ="date" name = "t_date" value="yyyy-mm-dd"/></label><br>
            <label>From Time:<input type ="time" name = "f_time" value="hh"/></label><br>
            <label>To Time:<input type ="time" name = "t_time" value="hh"/></label><br>
            <input type="submit" name="proceed" value="Proceed"/>
        </form>

        <a href="index.php" >
            <div class = "button">
                <button name="cancel" value="cancel">Cancel</button>
            </div>
        </a>

    </body>
</html>
