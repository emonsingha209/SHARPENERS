<?php
    require_once "db.php";

	function managerApplicants($Name, $Email, $Address, $Division, $PostalCode, $ContactNumber, $Gender, $DateOfBirth, $BloodGroup, $CVLocation, $PictureLocation, $Post)
	{
		$conn = getConnection();
		$sql = "INSERT into applicantsmanager(Name, Email, Address, Division, PostalCode, ContactNumber, Gender, DateOfBirth, BloodGroup, CVLocation, PictureLocation, Post) VALUES ('{$Name}', '{$Email}', '{$Address}', '{$Division}', '{$PostalCode}', '{$ContactNumber}', '{$Gender}', '{$DateOfBirth}', '{$BloodGroup}','{$CVLocation}', '{$PictureLocation}', '{$Post}')";
		$result = mysqli_query($conn, $sql);
		return true;
	}
	function managerApplicantsGetResult()
	{
		$conn = getConnection();
		$sql = "select * from applicantsmanager";
		$result = mysqli_query($conn, $sql);
		return $result;
	}
    function managerApplicantsUniqueData($Email)
	{
		$conn = getConnection();
		$sql = "select * from applicantsmanager where Email='{$Email}'";
		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);

        if($count >0)
        {
            return true;
		}
		else
		{
			return false;
		}
	}
?>