<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `courses` WHERE `course_no` = '$_REQUEST[course_no]'") or die(mysqli_error());
	header('location:courses.php');