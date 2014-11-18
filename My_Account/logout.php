<?php
    require_once("../url.php");

    $cookie_name = "user";
	unset( $_COOKIE[$cookie_name] );
	$res = setcookie($cookie_name, '', time() - 3600, '/');

    header("Location: $rootURL/index.php");
?>