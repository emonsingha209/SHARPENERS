<?php
require_once "../../model/adminModel.php";
require_once "../../model/Message.php";
if(isset($_COOKIE['status'])){
    $data = adminData($_SESSION['email']);
?>
<!DOCTYPE html>
<html lang="en" theme="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Admin Profile | Sharpeners </title>
	<link rel="stylesheet" href="../../assets/css/StyleSheet1.css">
    <script src="../../assets/js/registration.js"></script>
</head>
<body>
    <div class="container">
        <div class="dataset">
            <div class="dataset1">
                <img src="<?php echo $_SESSION['pic'] ?>"><br>
                <p><?php echo $data['name'] ?></p> <br>
                <p><?php echo $data['usertype'] ?></p><br>
                <h6 id="camera">&#128247;</h6>
            </div>
            <div class="dataset2">
                <div class="address">
                    <div class="addressInfo" id="addressInfo">
                        <label>&#127968; Address</label>
                        <button id="edit-btn" onclick="UpdateOpen('addressInfo', 'addressUpdate');">&#9997;</button>
                        <p><?php echo $data['address'] ?>, <?php echo $data['division'] ?></p>
                    </div>
                    <div class="addressUpdate" id="addressUpdate">
                        <label>Update address information </label>
                        <button id="uc-btn" onclick="UpdateClose('addressInfo', 'addressUpdate');">Cancel</button>
                        <form id="admin-update-form" method="post" action="../../controller/Admin/AdminUpdateCheck.php" autocomplete = "off" onsubmit="return AdminAddressUp()" enctype="multipart/form-data" >
                            <fieldset>
                                <label for="addressInfo-up">Enter your new address here</label>
                                    <label for="address-up">Address<input type="text" id="address-up" name="addressup" value="<?php echo $data['address'] ?>"></label>
                                    <p class = "err" id="address-p"></p>
                                    <?php $division = $data['division'] ?>
                                    <label for="division-up">Division
                                        <select name="divisionup" id = "division-up">
                                            <option value="">Select Option</option>
                                            <option value="Dhaka" <?php if($division=="Dhaka") { echo "selected";} ?>>Dhaka</option>
                                            <option value="Chittagong" <?php if($division=="Chittogong") { echo "selected";} ?> >Chittagong</option>
                                            <option value="Sylhet" <?php if($division=="Sylhet") { echo "selected";} ?> >Sylhet</option>
                                            <option value="Rangpur" <?php if($division=="Rangpur") { echo "selected";} ?> >Rangpur</option>
                                            <option value="Khulna" <?php if($division=="Khulna") { echo "selected";} ?> >Khulna</option>
                                            <option value="Barishal" <?php if($division=="Barishal") { echo "selected";} ?> >Barishal</option>
                                            <option value="Rajshahi" <?php if($division=="Rajshahi") { echo "selected";} ?> >Rajshahi</option>
                                            <option value="Mymensingh"<?php if($division=="Mymensingh") { echo "selected";} ?> >Mymensingh</option>
                                        </select>
                                    </label>
                                <input type="submit" value="Update" />
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="contnum">
                    <div class="contInfo" id="contInfo">
                    <label>&#128222; Contact Info </label>
                    <button id="edit-btn" onclick="UpdateOpen('contInfo', 'contUpdate');">&#9997;</button>
                    <p>Mobile: <?php echo $data['contnum'] ?></p><br>
                    <p>Email: <?php echo $data['email'] ?></p>
                    </div>
                    <div class="contUpdate" id="contUpdate">
                        <label>Update contact information </label>
                        <button id="uc-btn" onclick="UpdateClose('contInfo', 'contUpdate');">Cancel</button>
                        <form id="admin-update-form" method="post" action="../../controller/Admin/AdminUpdateCheck.php" autocomplete = "off" onsubmit="return AdminAddressUp()" enctype="multipart/form-data" >
                            <fieldset>
                                <label for="contnumInfo-up">Enter your new contact information here
                                    <label for="contnum-up">Phone Number<input type="text" id="contnum-up" name="contnumup" value="<?php echo $data['contnum'] ?>"></label>
                                </label>
                                <p class = "err" id="contnum-p"></p>
                                <input type="submit" value="Update" />
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="basic">
                    <div class="basicInfo" id="basicInfo">
                        <label>Basic Info</label>
                        <button id="edit-btn" onclick="UpdateOpen('basicInfo', 'basicUpdate');">&#9997;</button>
                        <label>&#128100; Gender</label>
                        <p><?php echo $data['gender'] ?></p>
                        <label>&#127874; Birthday</label>
                        <p><?php echo $data['dob'] ?></p>
                        <label>&#129656; Blood Group</label>
                        <p><?php echo $data['bg'] ?></p>
                    </div>
                    <div class="basicUpdate" id="basicUpdate">
                        <label>Update contact information</label>
                        <button id="uc-btn" onclick="UpdateClose('basicInfo', 'basicUpdate');">Cancel</button>
                        <form id="admin-update-form" method="post" action="../../controller/Admin/AdminUpdateCheck.php" autocomplete = "off" onsubmit="return AdminAddressUp()" enctype="multipart/form-data" >
                            <fieldset>
                                <label for="basicInfo-up">Enter your new basic information here</label>
                                <?php $gender = $data['gender'] ?>
                                <label for="gender-up">Gender
                                    <label><input type="radio" id = "gender-male-up" name="genderup" value= "Male" class="inline" <?php if($gender=="Male") { echo "checked";} ?>> Male </label>
                                    <label><input type="radio" id = "gender-female-up" name="genderup" value= "Female" class="inline" <?php if($gender=="Female") { echo "checked";} ?>> Female </label>
                                    <label><input type="radio" id = "gender-others-up" name="genderup" value= "Other" class="inline" <?php if($gender=="Other") { echo "checked";} ?>> Other </label>
                                </label>
                                    <?php $dob = date("Y-m-d", strtotime($data['dob'])); ?>
                                    <label for="dob-up">Date Of Birth<input type="date" id = "dob-up" name="dobup" value="<?php echo $dob ?>" ></label>
                                    <?php $bg = $data['bg'] ?>
                                    <label for="bg-up">Blood Group
                                        <select name="BloodGroup" id = "bg-up" >
                                            <option value="">Select Option</option>
                                            <option value="A+" <?php if($bg=="A+") { echo "selected";} ?>>A+</option>
                                            <option value="A-" <?php if($bg=="A-") { echo "selected";} ?>>A-</option>
                                            <option value="B+" <?php if($bg=="B+") { echo "selected";} ?>>B+</option>
                                            <option value="B-" <?php if($bg=="B-") { echo "selected";} ?>>B-</option>
                                            <option value="AB+" <?php if($bg=="AB+") { echo "selected";} ?>>AB+</option>
                                            <option value="AB-" <?php if($bg=="AB-") { echo "selected";} ?>>AB-</option>
                                            <option value="O+" <?php if($bg=="O+") { echo "selected";} ?>>O+</option>
                                            <option value="O-" <?php if($bg=="O-") { echo "selected";} ?>>O-</option>
                                        </select>
                                    </label>
                                <p class = "err" id="contnum-p"></p>
                                <input type="submit" value="Update" />
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="joindate">
                    <label>&#128197; Joining Date</label>
                    <p><?php echo $data['joindate'] ?></p>
                </div>
            </div>
        </div>
        <footer>
		    <?php include "../CommonFile/footer.php" ?>
	    </footer>
    </div>
    <?php include "AdminMenu.php" ?>
</body>
</html>
<?php
}
else {
    header('location:../CommonFile/login.php');
}
?>