<?php
	require_once '../cnntdb.php';
	require_once '../url.php';

	connect();

	$sql = "DELETE FROM BkingDetail WHERE Uname='".$_GET['Uname']."' AND Rname='".$_GET['Rname']."' AND Status='active' AND fdate='".$_GET['fdate']."'";
	if ( $conn->query($sql) ) {
	    header("Location: $rootURL/index.php");
	}
?>