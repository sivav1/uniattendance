<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `programme` WHERE `programme_code` = '$_REQUEST[program_id]'") or die(mysqli_error());
	header('location:programs.php');