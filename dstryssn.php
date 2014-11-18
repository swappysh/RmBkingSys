<?php

	require_once 'url.php';

	session_start();

	session_unset();

	session_destroy();

    header("Location: $rootURL/index.php");
?>