<?php 
	session_start();
	require_once "../../model/ApplicantsManagerModel.php";
	require_once "../../model/ManagerModel.php";

	$Email = $_GET['email'];

	$data = managerApplicantsGetData($Email);

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

	$data = managerUniqueData($Email);
	if($data)
	{
		$errmsg = "This user is already exist.";
		$error = true;
	}

	if(!$error)
	{
		$status = ManagerReg($Name, $Email, $Address, $Division, $PostalCode, $ContactNumber, $Gender, $DateOfBirth, $BloodGroup, $Cv, $Pic, $Post, $Password, $joiningdate);
		if($status)
		{
			$_SESSION['Hmessage'] = "New Manager Assinged Successfully";
			$_SESSION['message'] = $Name." is now a manager.";
			$_SESSION['condition'] = true;
			$_SESSION['OkIcon'] = true;
			ApplicantsRemove($Email);
			header('location:../../view/Admin/ManagerApplicants.php');
		}
		else
		{
			$_SESSION['Hmessage'] = "Registration Failed";
			$_SESSION['message'] = "Something is wrong. Unsuccessful Attempt.";
			$_SESSION['condition'] = true;
			$_SESSION['WarningIcon'] = true;
			header('location:../../view/Admin/ManagerApplicants.php');
		}
	}
	else
	{
		$_SESSION['Hmessage'] = "Registration Failed";
		$_SESSION['message'] = $errmsg;
		$_SESSION['condition'] = true;
		$_SESSION['WarningIcon'] = true;
		header('location:../../view/Admin/ManagerApplicants.php');
	}
?>