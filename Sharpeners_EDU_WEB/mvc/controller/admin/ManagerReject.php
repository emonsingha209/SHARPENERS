<?php 
	session_start();
	require_once "../../model/ApplicantsTeacherModel.php";

	$Email = $_GET['email'];

	ApplicantsRemove($Email);
	header('location:../../view/Admin/TeacherApplicants.php');
?>