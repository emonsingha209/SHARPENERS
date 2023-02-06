<?php
    require_once "db.php";

	function adminLogin($Email, $usertype, $Password)
	{
		$conn = getConnection();
		$sql = "select * from admin where Email='{$Email}' and Usertype= '{$usertype}' and Password='{$Password}'";
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
	function adminReg($Name, $usertype, $Email, $Password, $Address, $Division, $PostalCode, $ContactNumber, $Gender, $DateOfBirth, $BloodGroup, $PictureLocation, $joiningdate)
	{
		$conn = getConnection();
		$sql = "INSERT into admin(Name, Usertype, Email, Password, Address, Division, PostalCode, ContactNumber, Gender, DateOfBirth, BloodGroup, PictureLocation, JoinDate) VALUES ('{$Name}', '{$usertype}', '{$Email}', '{$Password}', '{$Address}', '{$Division}', '{$PostalCode}', '{$ContactNumber}', '{$Gender}', '{$DateOfBirth}', '{$BloodGroup}', '{$PictureLocation}', '{$joiningdate}')";
		$result = mysqli_query($conn, $sql);
		if($result === true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function adminData($Email)
	{
		$conn = getConnection();
		$sql = "select * from admin where Email='{$Email}'";
		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);

        if($count >0){
            while($row = mysqli_fetch_assoc($result)) {
				$adata = [
							'name' => $row['Name'],
							'email' => $row['Email'],
							'address' => $row['Address'],
							'division' => $row['Division'],
							'postalcode' => $row['PostalCode'],
							'contnum' => $row['ContactNumber'],
							'gender' => $row['Gender'],
							'dob' => $row['DateOfBirth'],
							'bg' => $row['BloodGroup'],
							'pic' => $row['PictureLocation'],
							'joindate' => $row['JoinDate'],
							'usertype' => $row['Usertype'],
						];
					return $adata;
		}
        }
		else
		{
			return false;
		}
	}
	function adminGetResult()
	{
		$conn = getConnection();
		$sql = "select * from admin";
		$result = mysqli_query($conn, $sql);
		return $result;
	}
    function adminUniqueData($Email)
	{
		$conn = getConnection();
		$sql = "select * from admin where Email='{$Email}'";
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