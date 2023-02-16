<?php 
	session_start();
	require_once "../../model/adminModel.php";

	$Email = $_GET['email'];

	AdminRemove($Email);
	header('location:../../view/Admin/AdminRemove.php');
?>