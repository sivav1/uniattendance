<?php
	require_once '../connect.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$q_login = $conn->query("SELECT * FROM `faculty` WHERE `faculty_email` = '$username' && `faculty_password` = '$password'") or die(msqli_error());
	$f_login = $q_login->fetch_array();
	$v_login = $q_login->num_rows;
	if($v_login > 0){
		echo 'success';
		session_start();
		$_SESSION['faculty_id'] = $f_login['faculty_id'];
	}