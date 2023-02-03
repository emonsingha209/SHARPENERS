<?php
	require_once "../../model/Message.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Manager Application Form | Sharpeners</title>
	<link rel="stylesheet" href="../../assets/css/StyleSheet1.css">
	<script src="../../assets/js/registration.js"></script>
</head>
<body>
	<div class = "ApplicationForm">
		<div class = "popup" id = "<?php Condition()?>">
			<img src="../../assets/logo/ok_icon.png" alt="ok" id="<?php OkIcon() ?>" class="iconPopup">
			<img src="../../assets/logo/warning_sign.png" alt="ok" id="<?php WarningIcon() ?>" class="iconPopup">
			<h2 id = "hmessage"><?php ShowHeadMessage() ?></h2>
			<p id = "message" ><?php ShowMessage() ?></p>
			<button type="button" id = "close-btn" onclick="ClosePopup()">OK</button>
		</div>
		<h1 id="title">MANAGER APPLICATION FORM</h1>
		<p id="data">Please fill up this form with right information</p>
		<form id="reg-form" method="post" action="../../controller/Manager/ApplicantsManagerCheck.php" autocomplete = "off" onsubmit="return ManagerReg()" enctype="multipart/form-data" >
			<fieldset>
				<label id="name-label">Name<input type="text" id = "name" name="name" placeholder="Enter Your Name" ></label>
				<p class = "err" id="name-p"></p>
				<label id="email-label">Email<input type="email" id = "email" name="email" placeholder="Enter Your Email" onkeyup = "UniqueEmail()" ></label>	
				<p class = "err" id="email-p"></p>
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
                <label id="CV-label">Drop Your CV here
					<input type="file" id = "cv" name="cv" class="file" >
				</label>
				<p class = "err" id="cv-p"></p>
				<label id="Pic-label">Upload Your Picture
					<input type="file" id = "pic" name="picture" class="file" >
				</label>
				<p class = "err" id="pic-p"></p>
                <label id="post-label">Apply as
					<label><input type="radio" id = "post-manager" name="post" value= "Manager" class="inline" /> Manager </label>
					<label><input type="radio" id = "post-assist-manager" name="post" value= "Assistant Manager" class="inline" /> Assistant Manager </label>
				</label>
                <p class = "err" id="post-p"></p>
				<input type="submit" value="Apply" />
				<p class = "err" id="warn-p"></p>
			</fieldset>
		</form>
        <div class="checkstatus">
            <p>Already Applied?</p>
            <a href="AdminRegistration.php" id="checkstatus">Check Status Here</a>
            <br>
        </div>
        <div class="back">
            <a href="login.php" id="back">Back</a>
        </div>
	</div>
</body>
</html>