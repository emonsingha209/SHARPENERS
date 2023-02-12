<?php
    require_once "db.php";

	function managerLogin($Email, $usertype, $Password)
	{
		$conn = getConnection();
		$sql = "select * from manager where Email='{$Email}' and Usertype= '{$usertype}' and Password='{$Password}'";
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
	function ManagerReg($Name, $Email, $Address, $Division, $PostalCode, $ContactNumber, $Gender, $DateOfBirth, $BloodGroup, $Cv, $Pic, $Post, $Password, $joiningdate)
	{
		$conn = getConnection();
		$sql = "INSERT into manager(Name, Usertype, Email, Address, Division, PostalCode, ContactNumber, Gender, DateOfBirth, BloodGroup, CVLocation, PictureLocation, Password, JoinDate) VALUES ('{$Name}', '{$Post}', '{$Email}', '{$Address}', '{$Division}', '{$PostalCode}', '{$ContactNumber}', '{$Gender}', '{$DateOfBirth}', '{$BloodGroup}', '{$Cv}', '{$Pic}', '{$Password}', '{$joiningdate}')";
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
	function managerUniqueData($Email)
	{
		$conn = getConnection();
		$sql = "select * from manager where Email='{$Email}'";
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
	function managerGetResult()
	{
		$conn = getConnection();
		$sql = "select * from manager";
		$result = mysqli_query($conn, $sql);
		return $result;
	}
	function managerData($Email)
	{
		$conn = getConnection();
		$sql = "select * from manager where Email='{$Email}'";
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
							'branch' => $row['Branch'],
						];
					return $adata;
		}
        }
		else
		{
			return false;
		}
	}
?>