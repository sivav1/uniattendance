<?php
	require_once 'connect.php';
	$q_manage_subject_status = $conn->query("SELECT status FROM `manage_subject` WHERE 'id'='$_REQUEST[id]'") or die(mysqli_error());
	$f_manage_subject_status = $q_manage_subject_status->fetch_array();
	$status = $f_manage_subject_status['status'];
	if($status == 0)
	{
		$conn->query("UPDATE `manage_subject` SET `status` = '1' WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
	}
	else if($status == 1)
	{
		$conn->query("UPDATE `manage_subject` SET `status` = '0' WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
	}
	else
	{}
	header('location:manage_subject.php');