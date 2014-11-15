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
        <form name = "Form2"  onsubmit="return validateForm()" method = "post"  action = '' >
            <label>Sort By:
                <select name="sort_by">
                    <option>option 1</option>
                </select>
            </label>
            <label>Price Range:
                <input type="checkbox" name="range" value="value1">Value 1
            </label>
            <input type="button" name="proceed" value="Proceed"/>
            <input type="button" name="back" value="Back"/>
            <input type="button" name="cancel" value="Cancel"/>
        </form>
    </body>
</html>
