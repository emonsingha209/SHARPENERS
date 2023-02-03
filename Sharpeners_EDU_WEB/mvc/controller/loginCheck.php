<?php 
    require_once "../model/Message.php";
	require_once "../model/adminModel.php";

	$email = $_POST['Email'];
	$password = $_POST['Password'];
	$usertypeAdmin = "Admin"; 
    $login = false;
	
	if(adminLogin($email, $usertypeAdmin, $password))
	{
        $login = true;
		$_SESSION['status'] = true;
		$adata = adminData($email);
		$_SESSION['email'] = $email;
		$_SESSION['user'] = $adata['name'];
		$_SESSION['pic'] = $adata['pic'];
		setcookie('status', 'true', time()+43200, '/');
		header('location: ../view/admin/AdminList.php');
	}
    if(!$login)
    {
        $_SESSION['Hmessage'] = "Invalid Email OR Incorrect Password";
		$_SESSION['message'] = $email;
        $_SESSION['condition'] = true;
        header('location: ../view/login.php');
    }
?>