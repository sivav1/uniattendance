<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `subjects` WHERE `subject_id` = '$_REQUEST[subject_id]'") or die(mysqli_error());
	header('location:subjects.php');