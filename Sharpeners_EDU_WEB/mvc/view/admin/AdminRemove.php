<?php
    $AdminRemove = true;
    require_once "../../model/adminModel.php";
    require_once "../../model/Message.php";
    if(isset($_COOKIE['status'])){
        $result = adminGetResult();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Remove Admin | Admin </title>
	<link rel="stylesheet" href="../../assets/css/StyleSheet1.css">
    <script src="../../assets/js/registration.js"></script>
</head>
<body>
    <div class="container">
        <h1 id="title">Remove Admin</h1>
        <h1 id="<?php if(mysqli_num_rows($result) == 0) { echo "no-data-show";} else { echo "no-data-hide";} ?>">No Admin Data Found</h1>
        <div class="AdminRemove">
            <table class="table">
                <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><img src="<?php echo $row['PictureLocation'] ?>" alt="user-pic"></td>
                    <td><?php echo $row['Name'] ?></td>
                    <td><?php echo $row['Email'] ?></td>
                    <td><a href="../../controller/admin/AdminRemoveCheck.php?email=<?php echo $row['Email'] ?>">Remove</a></td>
                </tr>
                <?php } ?>
            </table>
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
		header('location:../login.php');
	}
?>