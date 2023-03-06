<?php
    require_once "../../model/managerModel.php";
    require_once "../../model/Message.php";
    if(isset($_COOKIE['status'])){
        $result = managerGetResult();
?>
<!DOCTYPE html>
<html lang="en" theme="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Manager List | Sharpeners </title>
	<link rel="stylesheet" href="../../assets/css/StyleSheet1.css">
</head>
<body>
    <div class="container">
        <h1 id="title">Managers Of SHARPENERS</h1>
        <h1 id="<?php if(mysqli_num_rows($result) == 0) { echo "no-data-show";} else { echo "no-data-hide";} ?>">Manager List Is Empty</h1>
        <div class="card-box">
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <div class="card">
                <img src="<?php echo $row['PictureLocation'] ?>" alt="user-pic"><br>
                <p id="card-name"><?php echo $row['Name'] ?></p> <br>
                <p><?php echo $row['Email'] ?></p>
                <a href="ManagerProfile.php?email=<?php echo $row['Email'] ?>" id="details">Details</a>
            </div>
    <?php } ?>
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
		header('location: ../CommonFile/login.php');
	}
?>