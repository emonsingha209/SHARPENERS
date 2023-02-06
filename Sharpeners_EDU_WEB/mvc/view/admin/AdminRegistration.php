<?php
	$addadmin = true;
	require_once "../../model/Message.php";
	if(isset($_COOKIE['status'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>New Admin Registration | Admin</title>
	<link rel="stylesheet" href="../../assets/css/StyleSheet1.css">
	<script src="../../assets/js/registration.js"></script>
</head>
<body>
	<div class = "container">
		<div class = "popup" id = "<?php Condition() ?>">
			<img src="../../assets/logo/ok_icon.png" alt="ok" id="<?php OkIcon() ?>" class="iconPopup">
			<img src="../../assets/logo/warning_sign.png" alt="ok" id="<?php WarningIcon() ?>" class="iconPopup">
			<h2 id = "hmessage"><?php ShowHeadMessage() ?></h2>
			<p id = "message" ><?php ShowMessage() ?></p>
			<button type="button" id = "close-btn" onclick="ClosePopup()">OK</button>
		</div>
		<h1 id="title">ADMIN REGISTRATION FORM</h1>
		<p id="data">Please fill up this form with right information</p>
		<form id="reg-form" method="post" action="../../controller/Admin/AdminRegCheck.php" autocomplete = "off" onsubmit="return AdminReg()" enctype="multipart/form-data" >
			<fieldset>
				<label id="name-label">Name<input type="text" id = "name" name="name" placeholder="Enter Your Name" ></label>
				<p class = "err" id="name-p"></p>
				<label id="email-label">Email<input type="email" id = "email" name="email" placeholder="Enter Your Email" onkeyup = "UniqueEmail()" ></label>	
				<p class = "err" id="email-p"></p>				
				<label id="pass-label">Password<input type="password" id = "password" name="Password" placeholder="Enter Your Password" onkeyup="PassVal()" ></label>
				<p class = "err" id="password-p"></p>
				<p class = "err" id="num-p"></p>
				<p class = "err" id="lowercase-p"></p>
				<p class = "err" id="uppercase-p"></p>
				<p class = "err" id="min-p"></p>
				<p class = "err" id="max-p"></p>
				<label id="cpass-label">Confirm Password<input type="password" id = "cpassword" name="Confirm_Password" placeholder="Confirm Your Password" onkeyup="CheckPass()" ></label>
				<p class = "err" id="cpassword-p"></p>
				<label id="address-label">Address<input type="text" id = "address" name="address" placeholder="Enter Your Address" ></label>
				<p class = "err" id="address-p"></p>
				<label id="division-label">Division
					<select name="division" id = "division" >
					<option value="">Select Option</option>
					<option value="Dhaka">Dhaka</option>
					<option value="Chittagong">Chittagong</option>
					<option value="Sylhet">Sylhet</option>
					<option value="Rangpur">Rangpur</option>
					<option value="Khulna">Khulna</option>
					<option value="Barishal">Barishal</option>
					<option value="Rajshahi">Rajshahi</option>
					<option value="Mymensingh">Mymensingh</option>
					</select>
				</label>			
				<p class = "err" id="division-p"></p>			
				<label id="postalcode-label">Post Code<input type="number" id = "postalcode" name="postalcode" placeholder="Enter Your Postal Code" ></label>	
				<p class = "err" id="postalcode-p"></p>					
				<label id="contnum-label">Contact Number<input type="tel" id = "contnum" name="contnum" placeholder="Enter Your Number" ></label>
				<p class = "err" id="contnum-p"></p>
				<label id="gender-label">Gender
					<label><input type="radio" id = "gender-male" name="gender" value= "Male" class="inline" /> Male </label>
					<label><input type="radio" id = "gender-female" name="gender" value= "Female" class="inline" /> Female </label>
					<label><input type="radio" id = "gender-others" name="gender" value= "Other" class="inline" /> Other </label>
				</label>
				<p class = "err" id="gender-p"></p>
				<label id="dob-label">Date Of Birth<input type="date" id = "dob" name="dob" ></label>
				<p class = "err" id="dob-p"></p>
				<label id="bg-label">Blood Group
					<select name="BloodGroup" id = "bg" >
						<option value="">Select Option</option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
					</select>
				</label>
				<p class = "err" id="bg-p"></p>
				<label id="Pic-label">Upload Your Picture
					<input type="file" id = "pic" name="picture" class="file" >
				</label>
				<p class = "err" id="pic-p"></p>
				<input type="submit" value="Sign Up" />
				<p class = "err" id="warn-p"></p>
			</fieldset>
		</form>
		<footer>
			<?php require "../footer.php" ?>
		</footer>
	</div>
	<?php require "AdminMenu.php" ?>
</body>
</html>
<?php
	}
	else {
		header('location:../login.php');
	}
?>