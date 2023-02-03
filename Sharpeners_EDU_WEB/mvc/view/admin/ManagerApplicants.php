<?php
    $ManagerApplicants = true;
    require_once "../../model/ApplicantsManagerModel.php";
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
</head>
<body>
    <div class="container">
        <h2 id="title">Applicants For Manager Post</h2>
        <div class="Applicants">
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <div class="ApplicantsData">
                <img src="<?php echo $row['PictureLocation'] ?> " alt="user-pic">
                <p><b>Name: </b><?php echo $row['Name'] ?></p>
                <p><b>Email: </b><?php echo $row['Email'] ?></p>
                <p><b>Address: </b><?php echo $row['Address'] ?></p>
                <p><b>Division: </b><?php echo $row['Division'] ?></p>
                <p><b>Postal Code: </b><?php echo $row['PostalCode'] ?></p>
                <p><b>Contact Number: </b><?php echo $row['ContactNumber'] ?></p>
                <p><b>Gender: </b><?php echo $row['Gender'] ?></p>
                <p><b>Date Of Birth: </b><?php echo $row['DateOfBirth'] ?></p>
                <p><b>Blood Group: </b><?php echo $row['BloodGroup'] ?></p>
                <p><b>Applied for: </b><?php echo $row['Post'] ?></p>
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