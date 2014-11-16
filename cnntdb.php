<?php    
    $conn;

    function connect()
    {
        global $conn;
        $servername = "localhost";
        $username = "root";
        $password = "getready4";
        $dbname = "MiniProject";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_errno) {
            die("<div class=\"alert alert-danger\" role=\"alert\">Connection failed: ".$conn->connect_error()."</div>");
        }
    }
?>