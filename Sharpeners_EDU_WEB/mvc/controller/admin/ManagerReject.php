<?php 
	session_start();
	require_once "../../model/ApplicantsManagerModel.php";
	require_once "../../model/ManagerModel.php";

	$Email = $_GET['email'];

	ApplicantsRemove($Email);
	header('location:../../view/Admin/ManagerApplicants.php');
?>