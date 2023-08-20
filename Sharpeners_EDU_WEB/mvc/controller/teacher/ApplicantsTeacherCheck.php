<?php 
	session_start();
	require_once "../../model/ApplicantsTeacherModel.php";
	
	$Name = $_POST['name'];
	$Email = $_POST['email'];
	$Address = $_POST['address'];
    $Division = $_POST['division'];
    $PostalCode = $_POST['postalcode'];
	$ContactNumber = $_POST['contnum'];
	if(!isset($_POST['gender']))
	{
		$Gender = "";
	}
	else
	{
		$Gender = $_POST['gender'];
	}
	$DateOfBirth = date("d-M-Y", strtotime($_POST['dob']));
	$BloodGroup = $_POST['BloodGroup'];

    $srcCv = $_FILES['cv']['tmp_name'];
	$cvname = $_FILES['cv']['name'];
	$cvtype = $_FILES['cv']['type'];
	$cvsize = $_FILES['cv']['size'];
	$arrCvFilename = explode('.',$cvname);
	$cvextension = end($arrCvFilename);
	$desCv = "../../assets/cv/".$Name."_".rand().".".$cvextension;

	$srcPic = $_FILES['picture']['tmp_name'];
	$picturename = $_FILES['picture']['name'];
	$picturetype = $_FILES['picture']['type'];
	$picturesize = $_FILES['picture']['size'];
	$arrFilename = explode('.',$picturename);
	$extension = end($arrFilename);
	$desPic = "../../assets/picture/".$Name."_".rand().".".$extension;

    if(!isset($_POST['post']))
	{
		$Post = "";
	}
	else
	{
		$Post = $_POST['post'];
	}

	$error = false;
	
	$status = false;

	if($Name == "" || $Email == "" || $Address == "" || $Division == "" || $PostalCode == "" || $ContactNumber == "" || $Gender == "" || $DateOfBirth == "" || $BloodGroup == "" || $srcCv == "" || $srcPic == "" || $Post == "")
	{
		$error = true;
		$errmsg = "Something is missing";

	}
	else
	{
		if(!preg_match("/^[A-Za-z\s]*$/", $Name) || strlen($Name) > 40 || strlen($Name) < 2)
		{
			$error = true;
			$errmsg = "Only Letter and whitespaces are allow.";
		}
		$bDot = strrpos($Email, ".") - strpos($Email, "@");
		$aDot = strlen($Email) - strrpos($Email, ".");
		if(preg_match("/[-_.]/",$Email[0]) || preg_match("/[-_.]/",$Email[strpos($Email, "@")-1]) || !preg_match("/^[A-Za-z0-9-_.@]*$/", $Email) || $bDot < 2 || $aDot < 3) 
		{
			$error = true;
			$errmsg = "Invalid Email";
		}
		
		if(strlen($PostalCode) != 4)
		{
			$errmsg = "Invalid PostalCode. ";
			$error = true;
		}
		
		if(strlen($ContactNumber) != 11 || !preg_match("/^01/", $ContactNumber))
		{
			$error = true;
			$errmsg = "Invalid phone number. ";
		}

		$dobYear = date("Y", strtotime($DateOfBirth));
		$currYear = date("Y");
		if($dobYear > $currYear-18)
		{
			$error = true;
			$errmsg = "Too young for this job";
		}

		if($dobYear < $currYear-40)
		{
			$error = true;
			$errmsg = "Too old for this job";
		}
        if($cvtype != "application/msword" && $cvtype != "application/vnd.openxmlformats-officedocument.wordprocessingml.document" && $cvtype != "application/pdf" )
		{
			$error = true;
			$errmsg = "Invalid File Format";
		}
        if($cvsize > 10485760)
		{
			$error = true;
			$errmsg = "File is too large, Upload less than or equal 10MB.";
		}
        if(!move_uploaded_file($srcCv, $desCv)){
			$error = true;
			$errmsg = "This file is not uploadable. Try another one.";
		}
		if($picturetype != "image/jpeg" && $picturetype != "image/png")
		{
			$error = true;
			$errmsg = "Invalid Image Format";
		}
		if($picturesize > 10485760)
		{
			$error = true;
			$errmsg = "File is too large, Upload less than or equal 10MB.";
		}
		if(!move_uploaded_file($srcPic, $desPic)){
			$error = true;
			$errmsg = "This pic is not uploadable. Try another one.";
		}
		
		$data = teacherApplicantsUniqueData($Email);
		if($data)
		{
			$errmsg = "Already Applied. Check your applied status from bottom of this form.";
			$error = true;
		}
	}
	if(!$error)
	{
		$status = teacherApplicants($Name, $Email, $Address, $Division, $PostalCode, $ContactNumber, $Gender, $DateOfBirth, $BloodGroup, $desCv, $desPic, $Post);
		if($status)
		{
			$_SESSION['Hmessage'] = "Successfully Applied";
			$_SESSION['message'] = "Keep checking applied status.";
			$_SESSION['condition'] = true;
			$_SESSION['OkIcon'] = true;
			header('location:../../view/Teacher/TeacherRegistration.php');
		}
		else
		{
			$_SESSION['Hmessage'] = "Your application is not recorded. Try again.";
			$_SESSION['message'] = "Something is wrong. Unsuccessful Attempt.";
			$_SESSION['condition'] = true;
			$_SESSION['WarningIcon'] = true;
			header('location:../../view/Teacher/TeacherRegistration.php');
		}
	}
	else
	{
		$_SESSION['Hmessage'] =  "Your application is not recorded. Try again.";
		$_SESSION['message'] = $errmsg;
		$_SESSION['condition'] = true;
		$_SESSION['WarningIcon'] = true;
		header('location:../../view/Teacher/TeacherRegistration.php');
	} 
?>