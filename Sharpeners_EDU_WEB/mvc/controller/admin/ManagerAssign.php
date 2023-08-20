<?php 
	session_start();
	require_once "../../model/ApplicantsTeacherModel.php";
	require_once "../../model/TeacherModel.php";

	$Email = $_GET['email'];

	$data = teacherApplicantsGetData($Email);

	$Name = $data['username'];
	$Address = $data['address'];
	$Division = $data['division'];
	$PostalCode = $data['postcode'];
	$ContactNumber = $data['contnum'];
	$Gender = $data['gender'];
	$DateOfBirth = $data['dob'];
	$BloodGroup = $data['bg'];
	$Cv = $data['cv'];
	$Pic = $data['pic'];
	$Post = $data['post'];
	$joiningdate = date("d-M-Y");
	$Password = rand();

	$error = false;

	$data = teacherUniqueData($Email);
	if($data)
	{
		$errmsg = "This user is already exist.";
		$error = true;
	}

	if(!$error)
	{
		$status = TeacherReg($Name, $Email, $Address, $Division, $PostalCode, $ContactNumber, $Gender, $DateOfBirth, $BloodGroup, $Cv, $Pic, $Post, $Password, $joiningdate);
		if($status)
		{
			$_SESSION['Hmessage'] = "New Teacher Assinged Successfully";
			$_SESSION['message'] = $Name." is now a teacher.";
			$_SESSION['condition'] = true;
			$_SESSION['OkIcon'] = true;
			ApplicantsRemove($Email);
			header('location:../../view/Admin/TeacherApplicants.php');
		}
		else
		{
			$_SESSION['Hmessage'] = "Registration Failed";
			$_SESSION['message'] = "Something is wrong. Unsuccessful Attempt.";
			$_SESSION['condition'] = true;
			$_SESSION['WarningIcon'] = true;
			header('location:../../view/Admin/TeacherApplicants.php');
		}
	}
	else
	{
		$_SESSION['Hmessage'] = "Registration Failed";
		$_SESSION['message'] = $errmsg;
		$_SESSION['condition'] = true;
		$_SESSION['WarningIcon'] = true;
		header('location:../../view/Admin/TeacherApplicants.php');
	}
?>