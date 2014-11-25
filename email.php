<?php

$to = "mradul.master@gmail.com";
$subject = "email try";
$message = "heyyyyy";
$header = "From: someone@mail.com";

if ( mail($to, $subject, $message, $header) ) {
	echo "email has been sent";
} else
echo "not sent";

?>