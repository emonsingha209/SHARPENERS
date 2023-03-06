<?php
	$current_page = basename($_SERVER['PHP_SELF']);
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
					<div class="btnNav" id="<?php if($_SESSION['usertype'] != "SuperAdmin") { echo "superadminfunction";} ?>">
						<button class="sidebtnnav" id="<?php if(substr($current_page, 0, 5) == "Admin") { echo "navcc";} ?>" onclick="openAdminNav()">Admin Management</button>
						<div class="linkNav" id="adminLinkNav">
							<a href="AdminRegistration.php" id="<?php if($current_page == "AdminRegistration.php") { echo "navcc";} ?>" >Add New Admin</a>
							<a href="AdminList.php" id="<?php if($current_page == "AdminList.php") { echo "navcc";} ?>" >Admin List</a>
							<a href="AdminManageCourse.php" id="<?php if($current_page == "AdminManageCourse.php") { echo "navcc";} ?>" >Admin Information Update Request</a>
							<a href="AdminRemove.php" id="<?php if($current_page == "AdminRemove.php") { echo "navcc";} ?>" >Remove Admin</a>
							<a href="AdminAppointSuperAdmin.php" id="<?php if($current_page == "AdminAppointSuperAdmin.php") { echo "navcc";} ?>" >Appoint a Super Admin</a>
							<a href="AdminActivities.php" id="<?php if($current_page == "AdminActivities.php") { echo "navcc";} ?>" >Admin's Activities</a>
						</div>
					</div>
					<div class="btnNav">
						<button class="sidebtnnav" id="<?php if(substr($current_page, 0, 7) == "Manager") { echo "navcc";} ?>" onclick="openManagerNav()">Manager Management</button>
						<div class="linkNav" id="managerLinkNav">
							<a href="ManagerApplicants.php" id="<?php if($current_page == "ManagerApplicants.php") { echo "navcc";} ?>" >Manager Applicants</a>
							<a href="ManagerList.php" id="<?php if($current_page == "ManagerList.php") { echo "navcc";} ?>" >Manager List</a>
							<a href="AdminManageCourse.php" id="<?php if($current_page == "AdminManageCourse.php") { echo "navcc";} ?>" >Manager Information Update Request</a>
							<a href="ManagerRemove.php" id="<?php if($current_page == "ManagerRemove.php") { echo "navcc";} ?>" >Remove Manager</a>
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
		<a href="OwnProfileAdmin.php" id="logo" >SHARPENERS</a>
		<a href="OwnProfileAdmin.php" class="username" id="user-name" ><img src="<?php echo $_SESSION['pic'] ?>"><?php echo $_SESSION['user'] ?></a>
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