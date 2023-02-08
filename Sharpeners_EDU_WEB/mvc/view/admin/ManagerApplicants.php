<?php
    $ManagerApplicants = true;
    require_once "../../model/ApplicantsManagerModel.php";
    require_once "../../model/Message.php";
    if(isset($_COOKIE['status'])){
        $result = managerApplicantsGetResult();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
                <p>Name: <?php echo $row['Name'] ?></p>
                <p>Email: <?php echo $row['Email'] ?></p>
                <p>Address: <?php echo $row['Address'] ?></p>
                <p>Division: <?php echo $row['Division'] ?></p>
                <p>Postal Code: <?php echo $row['PostalCode'] ?></p>
                <p>Contact Number: <?php echo $row['ContactNumber'] ?></p>
                <p>Gender: <?php echo $row['Gender'] ?></p>
                <p>Date Of Birth: <?php echo $row['DateOfBirth'] ?></p>
                <p>Blood Group: <?php echo $row['BloodGroup'] ?></p>
                <p>Applied for: <?php echo $row['Post'] ?></p>
                <label for="download">Download CV of candidate from this link:<a href="<?php echo $row['CVLocation'] ?>" id="download">Download</a></label>
                <a href="../../controller/admin/ManagerAssign.php?email=<?php echo $row['Email'] ?>">Assign</a>
                <a href="../../controller/admin/ManagerReject.php?email=<?php echo $row['Email'] ?>">Reject</a>
            </div>
    <?php } ?>
        </div>
        <footer>
		    <?php require_once "../footer.php" ?>
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