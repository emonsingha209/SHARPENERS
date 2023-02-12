<?php
    $AdminList = true;
    require_once "../../model/managerModel.php";
    require_once "../../model/Message.php";
    if(isset($_COOKIE['status'])){
        $result = managerGetResult();
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
        <h1 id="title">Managers Of SHARPENERS</h1>
        <div class="card-box">
            
            <div class="table">
                <table>
                    <tr>
                        <th>Emon</th>
                    </tr>
                    <tr>
                        <td>Oka</td>
                    </tr>
                </table>
            </div>
 
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