<?php
    require_once "../../model/ApplicantsManagerModel.php";
    require_once "../../model/Message.php";
    if(isset($_COOKIE['status'])){
        $result = managerApplicantsGetResult();
?>
<!DOCTYPE html>
<html lang="en" theme="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Applicants For Manager | Admin </title>
	<link rel="stylesheet" href="../../assets/css/StyleSheet1.css">
    <script src="../../assets/js/registration.js"></script>
</head>
<body>
    <div class="container">
        <h1 id="title">Applicants For Manager Post</h1>
        <h1 id="<?php if(mysqli_num_rows($result) == 0) { echo "no-data-show";} else { echo "no-data-hide";} ?>">No Applicants Right Now</h1>
        <div class="Applicants">
            <div class = "popup" id = "<?php Condition() ?>">
                <img src="../../assets/logo/ok_icon.png" alt="ok" id="<?php OkIcon() ?>" class="iconPopup">
                <img src="../../assets/logo/warning_sign.png" alt="ok" id="<?php WarningIcon() ?>" class="iconPopup">
                <h2 id = "hmessage"><?php ShowHeadMessage() ?></h2>
                <p id = "message" ><?php ShowMessage() ?></p>
                <div class="branch" id="">
                    <p>We need a form here</p>
                </div>
            </div>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <div class="ApplicantsData">
                <img src="<?php echo $row['PictureLocation'] ?> " alt="user-pic">
                <label for="name">Name: </label>
                <p id="name"><?php echo $row['Name'] ?></p><br>
                <label for="email">Email: </label>
                <p id="email"><?php echo $row['Email'] ?></p><br>
                <label for="address">Address: </label>
                <p id="address"><?php echo $row['Address'] ?></p><br>
                <label for="division">Division: </label>
                <p id="division"><?php echo $row['Division'] ?></p><br>
                <label for="postcode">Postal Code: </label>
                <p id="postcode"><?php echo $row['PostalCode'] ?></p><br>
                <label for="contnum">Contact Number: </label>
                <p id="contnum"><?php echo $row['ContactNumber'] ?></p><br>
                <label for="gender">Gender: </label>
                <p id="gender"><?php echo $row['Gender'] ?></p><br>
                <label for="dob">Date Of Birth: </label>
                <p id="dob"><?php echo $row['DateOfBirth'] ?></p><br>
                <label for="bg">Blood Group: </label>
                <p id="bg"><?php echo $row['BloodGroup'] ?></p><br>
                <label for="post">Applied for: </label>
                <p id="post"><?php echo $row['Post'] ?></p><br>
                <label for="download">Download CV of candidate from this link: </label><a href="<?php echo $row['CVLocation'] ?>" id="download">Download</a><br>
                <a href="../../controller/admin/ManagerAssign.php?email=<?php echo $row['Email'] ?>">Assign</a>
                <a href="../../controller/admin/ManagerReject.php?email=<?php echo $row['Email'] ?>">Reject</a>
            </div>
    <?php } ?>
        </div>
        <footer>
		    <?php require_once "../CommonFile/footer.php" ?>
	    </footer>
    </div>
    <?php require "AdminMenu.php" ?>
</body>
</html>
<?php
	}
	else {
		header('location:../CommonFile/login.php');
	}
?>