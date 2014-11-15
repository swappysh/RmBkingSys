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
        <form name = "Form1"  onsubmit="return validateForm()" method = "post"  action = '' >
            <label>Room Type:
                <select name="room_type">
                    <option>option 1</option>
                </select>
            </label>
            <label>Room Capacity:
                <select name="room_capacity">
                    <option>option 1</option>
                </select>
            </label>
            <label>From Date:<input type ="date" name = "f_date" value="yyyy-mm-dd"/></label>
            <label>To Date:<input type ="date" name = "t_date" value="yyyy-mm-dd"/></label>
            <label>From Time:<input type ="time" name = "f_time" value="hh"/></label>
            <label>To Time:<input type ="time" name = "t_time" value="hh"/></label>
            <input type="button" name="proceed" value="Proceed"/>
            <input type="button" name="cancel" value="Cancel"/>
        </form>
    </body>
</html>
