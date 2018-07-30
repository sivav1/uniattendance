<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `manage_faculty` WHERE `manage_faculty_id` = '$_REQUEST[manage_faculty_id]'") or die(mysqli_error());
	header('location:manage_faculty.php');