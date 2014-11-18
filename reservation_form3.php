<?php
    require_once 'cnntdb.php';

    connect();

    $sql = "SELECT Rdetails FROM Room WHERE Rname = '".$_GET['Rname']."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row['Rdetails'];
        }
    }
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
        <title>Review Form</title>
    </head>
    <body>
        <input type="button" name="proceed" value="Proceed"/>

        <a href="reservation_form1.php" >
            <div class = "button">
                <button name="back" value="back">Back</button>
            </div>
        </a>

        <a href="index.php" >
            <div class = "button">
                <button name="cancel" value="cancel">Cancel</button>
            </div>
        </a>

    </body>
</html>
