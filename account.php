<?php
	require_once 'connect.php';
	$q_adminname = $conn->query("SELECT * FROM `faculty` WHERE `faculty_email` = '$_SESSION[username]'") or die(mysqli_error());
	$f_adminname = $q_adminname->fetch_array();
	$admin_name = $f_adminname['faculty_name'];