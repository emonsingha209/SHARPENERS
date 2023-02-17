<?php
	require_once "../../model/Message.php";
	if(isset($_COOKIE['status'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Admin | Sharpeners </title>
	<link rel="stylesheet" href="../../assets/css/StyleSheet1.css">
	<script src="../../assets/js/function.js"></script>
</head>
<body>
	<div class = "topnav">
		<div class="logo">
			<h3><a href="Admin.php" id="logo" >SHARPENERS</a></h3>
		</div>
		<div class="username">
			<a href="AdminOwnProfile.php" id="user-name" ><img src="<?php echo $_SESSION['pic'] ?>"><?php echo $_SESSION['user'] ?></a>
		</div>
		<div class="changepass">
			<a href="changepass.php" id="cpass-btn">Change Password</a>
		</div>
		<div class="darkmode" id="darkmode">
			<button id="darkbtn" onclick="DarkMode()">Dark Mode</button>
		</div>
		<div class="logout">
			<a href="../../controller/CommonFile/LogOut.php" id="h-btn">Log Out</a>
		</div>
	</div>
	<div class = "sidenav" id="sidenav">
		<nav>
			<div class="allbtn">
				<div class="btnNav">
					<button onclick="openAdminNav()">Admin</button>
					<div class="linkNav" id="adminLinkNav">
						<a href="AdminRegistration.php" id="<?php if(isset($addadmin)) { echo "navcc";} ?>" >Add New Admin</a>
						<a href="AdminList.php" id="<?php if(isset($AdminList)) { echo "navcc";} ?>" >Admin List</a>
						<a href="AdminManageCourse.php" id="<?php if(isset($AdminUpdateReq)) { echo "navcc";} ?>" >Admin Information Update Request</a>
						<a href="AdminRemove.php" id="<?php if(isset($AdminRemove)) { echo "navcc";} ?>" >Remove Admin</a>
					</div>
				</div>
				<div class="btnNav">
					<button onclick="openManagerNav()">Manager</button>
					<div class="linkNav" id="managerLinkNav">
						<a href="ManagerApplicants.php" id="<?php if(isset($ManagerApplicants)) { echo "navcc";} ?>" >Manager Applicants</a>
						<a href="AdminList.php" id="<?php if(isset($AdminList)) { echo "navcc";} ?>" >Admin List</a>
						<a href="AdminManageCourse.php" id="<?php if(isset($AdminUpdateReq)) { echo "navcc";} ?>" >Admin Information Update Request</a>
						<a href="AdminRemove.php" id="<?php if(isset($AdminRemove)) { echo "navcc";} ?>" >Remove Admin</a>
					</div>
				</div>
				<div class="btnNav">
					<button onclick="openAdmin()">Teacher</button>
				</div>
				<div class="btnNav">
					<button onclick="openAdmin()">Student</button>
				</div>
			</div>
		</nav>
	</div>
</body>
</html>
<?php
	}
	else {
		header('location: ../CommonFile/login.php');
	}
?>