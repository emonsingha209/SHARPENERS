<?php 
	session_start();
	require_once "../../model/adminModel.php";
	
	$Name = $_POST['name'];
	$Email = $_POST['email'];
	$Password = $_POST['Password'];
	$conpassword = $_POST['Confirm_Password'];
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
	$usertype = "Admin";
	$joiningdate = date("d-M-Y");

	$srcPic = $_FILES['picture']['tmp_name'];
	$picturename = $_FILES['picture']['name'];
	$picturetype = $_FILES['picture']['type'];
	$picturesize = $_FILES['picture']['size'];
	$arrFilename = explode('.',$picturename);
	$extension = end($arrFilename);
	$desPic = "../../assets/picture/".$Name."_".rand().".".$extension;

	$error = false;
	
	$status = false;

	if($Name == "" || $Email == "" || $Password == "" || $conpassword == "" || $Address == "" || $Division == "" || $PostalCode == "" || $ContactNumber == "" || $Gender == "" || $DateOfBirth == "" || $BloodGroup == "" || $srcPic == "")
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

		if($Password != $conpassword)
		{
			$error = true;
			$errmsg = "Password and Confirm Password must be same";
		}

		if(strlen($Password) < 8 || strlen($Password) > 15 || !preg_match("/[0-9]/", $Password) || !preg_match("/[a-z]/", $Password) || !preg_match("/[A-Z]/", $Password)) 
		{
			$error = true;
			$errmsg = "Invalid Password";
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
		
		$data = adminUniqueData($Email);
		if($data)
		{
			$errmsg = "This email is already exist. Try different email. ";
			$error = true;
		}
	}
	if(!$error)
	{
		$status = adminReg($Name, $usertype, $Email, $Password, $Address, $Division, $PostalCode, $ContactNumber, $Gender, $DateOfBirth, $BloodGroup, $desPic, $joiningdate);
		if($status)
		{
			$_SESSION['Hmessage'] = "Registration Done";
			$_SESSION['message'] = $Name." is now an admin.";
			$_SESSION['condition'] = true;
			$_SESSION['OkIcon'] = true;
			header('location:../../view/Admin/AdminRegistration.php');
		}
		else
		{
			$_SESSION['Hmessage'] = "Registration Failed";
			$_SESSION['message'] = "Something is wrong. Unsuccessful Attempt.";
			$_SESSION['condition'] = true;
			$_SESSION['WarningIcon'] = true;
			header('location:../../view/Admin/AdminRegistration.php');
		}
	}
	else
	{
		$_SESSION['Hmessage'] = "Registration Failed";
		$_SESSION['message'] = $errmsg;
		$_SESSION['condition'] = true;
		$_SESSION['WarningIcon'] = true;
		header('location:../../view/Admin/AdminRegistration.php');
	}
?>