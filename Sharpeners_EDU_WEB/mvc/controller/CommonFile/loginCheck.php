<?php 
    require_once "../../model/Message.php";
	require_once "../../model/adminModel.php";

	$email = $_POST['Email'];
	$password = $_POST['Password'];
	$usertypeAdmin = "Admin"; 
	$usertypeSuperAdmin = "SuperAdmin";
    $login = false;
	
	if(adminLogin($email, $usertypeAdmin, $password))
	{
        $login = true;
		$_SESSION['status'] = true;
		$adata = adminData($email);
		$_SESSION['email'] = $email;
		$_SESSION['user'] = $adata['name'];
		$_SESSION['pic'] = $adata['pic'];
		$_SESSION['usertype'] = $adata['usertype'];
		setcookie('status', 'true', time()+43200, '/');
		header('location: ../../view/admin/AdminOwnProfile.php');
	}
	if(adminLogin($email, $usertypeSuperAdmin, $password))
	{
        $login = true;
		$_SESSION['status'] = true;
		$adata = adminData($email);
		$_SESSION['email'] = $email;
		$_SESSION['user'] = $adata['name'];
		$_SESSION['pic'] = $adata['pic'];
		$_SESSION['usertype'] = $adata['usertype'];
		setcookie('status', 'true', time()+43200, '/');
		header('location: ../../view/admin/AdminOwnProfile.php');
	}
    if(!$login)
    {
        $_SESSION['Hmessage'] = "Invalid email or password";
		$_SESSION['message'] = $email;
        $_SESSION['condition'] = true;
        header('location: ../../view/CommonFile/login.php');
    }
?>