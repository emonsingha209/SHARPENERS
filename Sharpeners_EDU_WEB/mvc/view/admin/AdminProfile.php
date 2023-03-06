<?php
require_once "../../model/adminModel.php";
require_once "../../model/Message.php";
if(isset($_COOKIE['status'])){
    $email = $_GET['email'];
    $data = adminData($email);
?>
<!DOCTYPE html>
<html lang="en" theme="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> <?php echo $data['name'] ?> | Sharpeners </title>
	<link rel="stylesheet" href="../../assets/css/StyleSheet1.css">
</head>
<body>
    <div class="container">
        <div class="dataset">
            <div class="dataset1">
                <img src="<?php echo $data['pic'] ?>" alt="user-pic"><br>
                <p><?php echo $data['name'] ?></p> <br>
                <p><?php echo $data['usertype'] ?></p><br>
            </div>
            <div class="dataset2">
                <div class="address">
                    <div class="addressInfo" id="addressInfo">
                        <label>&#127968; Address</label>
                        <p><?php echo $data['address'] ?>, <?php echo $data['division'] ?></p><br>
                        <p>Postal Code: <?php echo $data['postalcode'] ?></p>
                    </div>
                </div>
                <div class="contnum">
                    <div class="contInfo" id="contInfo">
                    <label>&#128222; Contact Info </label>
                    <p>Mobile: <?php echo $data['contnum'] ?></p><br>
                    <p>Email: <?php echo $data['email'] ?></p>
                    </div>
                </div>
                <div class="basic">
                    <div class="basicInfo" id="basicInfo">
                        <label>Basic Info</label>
                        <label>&#128100; Gender</label>
                        <p><?php echo $data['gender'] ?></p>
                        <label>&#127874; Birthday</label>
                        <p><?php echo $data['dob'] ?></p>
                        <label>&#129656; Blood Group</label>
                        <p><?php echo $data['bg'] ?></p>
                    </div>
                </div>
                <div class="joindate">
                    <label>&#128197; Joining Date</label>
                    <p><?php echo $data['joindate'] ?></p>
                </div>
            </div>
        </div>
        <div class="backtolist">
                <a href="../../view/admin/AdminList.php" id="back">Back</a>
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