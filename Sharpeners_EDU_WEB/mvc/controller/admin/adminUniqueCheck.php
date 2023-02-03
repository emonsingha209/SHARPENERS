<?php
    require_once "../../model/adminModel.php";

    $Email = $_POST['Email'];

    $data = adminUniqueData($Email);
	if($data)
	{
		echo "This email is already registered. Try different email.";
	}
?>