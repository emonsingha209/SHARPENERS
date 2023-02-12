<?php
    $AdminList = true;
    require_once "../../model/adminModel.php";
    require_once "../../model/Message.php";
    if(isset($_COOKIE['status'])){
        $result = adminGetResult();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Admin List | Sharpeners </title>
	<link rel="stylesheet" href="../../assets/css/StyleSheet1.css">
</head>
<body>
    <div class="container">
        <h1 id="title">Admins Of SHARPENERS</h1>
        <div class="card-box">
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <div class="card">
                <img src="<?php echo $row['PictureLocation'] ?>" alt="user-pic"><br>
                <p id="card-name"><?php echo $row['Name'] ?></p> <br>
                <p><?php echo $row['Email'] ?></p>
                <a href="AdminProfile.php?email=<?php echo $row['Email'] ?>" id="details">Details</a>
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
		header('location: ../CommonFile/login.php');
	}
?>