<?php
	require_once 'connect.php';
	$q_adminname = $conn->query("SELECT * FROM `faculty` WHERE `faculty_id` = '$_SESSION[faculty_id]'") or die(mysqli_error());
	$f_adminname = $q_adminname->fetch_array();
	$admin_name = $f_adminname['faculty_name'];//." ".$f_adminname['lastname'];
	?>