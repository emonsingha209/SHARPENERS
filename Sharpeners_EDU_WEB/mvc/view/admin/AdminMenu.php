<?php
	require_once "../../model/Message.php";
	if(isset($_COOKIE['status'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Admin | Sharpeners </title>
	<link rel="stylesheet" href="../../assets/css/StyleSheet1.css">
</head>
<body>
	<div class = "topnav">
		<div class="logo">
			<h3><a href="Admin.php" id="logo" >SHARPENERS</a></h3>
		</div>
		<div class="username">
			<a href="AdminProfile.php" id="user-name" ><img src=<?php echo $_SESSION['pic'] ?>><?php echo $_SESSION['user'] ?></a>
		</div>
		<div class="changepass">
			<a href="changepass.php" id="cpass-btn">Change Password</a>
		</div>
		<div class="logout">
			<a href="../../controller/LogOut.php" id="h-btn">Log Out</a>
		</div>
	</div>
	<div class = "sidenav" id="sidenav">
		<nav>
			<a href="AdminRegistration.php" id="<?php if(isset($addadmin)) { echo "navcc";} ?>" >Add New Admin</a>
			<a href="AdminList.php" id="<?php if(isset($AdminList)) { echo "navcc";} ?>" >View Admin List</a>
			<a href="ManagerApplicants.php" id="<?php if(isset($ManagerApplicants)) { echo "navcc";} ?>" >Manager Applicants</a>
			<a href="AdminManageCourse.php" id="<?php if(isset($course)) { echo "navcc";} ?>" >Manage Course</a>
			<a href="new.php" id="<?php if(isset($book)) { echo "navcc";} ?>" >Manage Book</a>
			<a href="ok.php" id="<?php if(isset($cv)) { echo "navcc";} ?>" >View CV</a>
		</nav>
	</div>
</body>
</html>
<?php
	}
	else {
		header('location:../login.php');
	}
?>