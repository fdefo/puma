<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	clearstatcache();
	
	// pull the raw binary data from the POST array
	$data = $_FILES['data']['tmp_name'];
	$dir = $_POST['location'];
	$filename = $dir . '/' . $_POST['fname'];
	move_uploaded_file($data, $filename);
?>
