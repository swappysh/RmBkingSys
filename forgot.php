<!DOCTYPE html>
<html>
<head>
  <title>Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="dist/css/bootstrap.min.css">
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
