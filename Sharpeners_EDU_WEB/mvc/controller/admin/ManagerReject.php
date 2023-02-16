<?php 
	session_start();
	require_once "../../model/ApplicantsManagerModel.php";

	$Email = $_GET['email'];

	ApplicantsRemove($Email);
	header('location:../../view/Admin/ManagerApplicants.php');
?>