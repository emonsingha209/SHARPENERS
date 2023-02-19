<?php 
	session_start();
	require_once "../../model/adminModel.php";

	$Email = $_GET['email'];

	AppointSuperAdmin($Email);
	header('location:../../view/Admin/AppointSuperAdmin.php');
?>