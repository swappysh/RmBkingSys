<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Forgot User Name or Password</title>
    </head>
    <body>
        <form name = "Forgot Form"  onsubmit="return validateForm()" method = "post"  action = '' >
            <label>eMail ID:<input type = "email" name = "email" /></label><br>
            <label>Mobile Number:<input type="text" name="mob_num" /></label><br>
            <input type="button" name="sumbit" value="Submit"/>
        </form>

        <a href="index.php" >
        	<div class = "button">
        		<button name="cancel" value="cancel">Cancel</button>
        	</div>
        </a>
    </body>
</html>
