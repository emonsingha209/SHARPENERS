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
	<div class="sidenavs" id="sidenav">
		<div class = "sidenav">
			<nav>
				<div class="allbtn">
					<div class="btnNav">
						<button class="sidebtnnav" id="<?php if($_SESSION['usertype'] != "SuperAdmin") { echo "superadminfunction";} ?>" onclick="openAdminNav()">Admin Management</button>
						<div class="linkNav" id="adminLinkNav">
							<a href="AdminRegistration.php" id="<?php if(isset($addadmin)) { echo "navcc";} ?>" >Add New Admin</a>
							<a href="AdminList.php" id="<?php if(isset($AdminList)) { echo "navcc";} ?>" >Admin List</a>
							<a href="AdminManageCourse.php" id="<?php if(isset($AdminUpdateReq)) { echo "navcc";} ?>" >Admin Information Update Request</a>
							<a href="AdminRemove.php" id="<?php if(isset($AdminRemove)) { echo "navcc";} ?>" >Remove Admin</a>
							<a href="AppointSuperAdmin.php" id="<?php if(isset($AdminSuper)) { echo "navcc";} ?>" >Appoint a Super Admin</a>
							<a href="#" id="<?php if(isset($AdminActivity)) { echo "navcc";} ?>" >Admin's Activities</a>
						</div>
					</div>
					<div class="btnNav">
						<button class="sidebtnnav" onclick="openManagerNav()">Manager Management</button>
						<div class="linkNav" id="managerLinkNav">
							<a href="ManagerApplicants.php" id="<?php if(isset($ManagerApplicants)) { echo "navcc";} ?>" >Manager Applicants</a>
							<a href="ManagerList.php" id="<?php if(isset($ManagerList)) { echo "navcc";} ?>" >Manager List</a>
							<a href="AdminManageCourse.php" id="<?php if(isset($AdminUpdateReq)) { echo "navcc";} ?>" >Manager Information Update Request</a>
							<a href="ManagerRemove.php" id="<?php if(isset($AdminRemove)) { echo "navcc";} ?>" >Remove Manager</a>
						</div>
					</div>
					<div class="btnNav">
						<button class="sidebtnnav" onclick="openAdmin()">Teacher Management</button>
					</div>
					<div class="btnNav">
						<button class="sidebtnnav" onclick="openAdmin()">Student Management</button>
					</div>
					<div class="btnNav">
						<button class="sidebtnnav" onclick="openAdmin()">Branch Information</button>
					</div>
				</div>
			</nav>
		</div>
		<div class="sideicondiv" id="sideicondiv">
			<button class="sideicon" id="sideicon" onclick="openSideNav()">&#9776;</button>
		</div>
	</div>
	<div class = "topnav" id="topnav">
		<a href="AdminOwnProfile.php" id="logo" >SHARPENERS</a>
		<a href="AdminOwnProfile.php" class="username" id="user-name" ><img src="<?php echo $_SESSION['pic'] ?>"><?php echo $_SESSION['user'] ?></a>
		<a href="changepass.php" class="right" id="cpass-btn">Change Password</a>
		<a href="changepass.php" class="right" id="cpass-btn">Message</a>
		<a href="../../controller/CommonFile/LogOut.php" class="right" id="h-btn">Log Out</a>
		<button class="icon" id="icon" onclick="openTopNav()">&#9776;</button>
	</div>
</body>
</html>
<?php
	}
	else {
		header('location: ../CommonFile/login.php');
	}
?>