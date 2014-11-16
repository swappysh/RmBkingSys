<?php
    $rootURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
    if ($_SERVER["SERVER_PORT"] != "80")
    {
        $rootURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].'/rmbkingsys';
    }
    else 
    {
        $rootURL .= $_SERVER["SERVER_NAME"].'/rmbkingsys';
    }
?>    