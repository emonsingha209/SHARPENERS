<?php
    require_once "db.php";

	function teacherApplicants($Name, $Email, $Address, $Division, $PostalCode, $ContactNumber, $Gender, $DateOfBirth, $BloodGroup, $CVLocation, $PictureLocation, $Post)
	{
		$conn = getConnection();
		$sql = "INSERT into applicantsteacher(Name, Email, Address, Division, PostalCode, ContactNumber, Gender, DateOfBirth, BloodGroup, CVLocation, PictureLocation, Post) VALUES ('{$Name}', '{$Email}', '{$Address}', '{$Division}', '{$PostalCode}', '{$ContactNumber}', '{$Gender}', '{$DateOfBirth}', '{$BloodGroup}','{$CVLocation}', '{$PictureLocation}', '{$Post}')";
		$result = mysqli_query($conn, $sql);
		return true;
	}
	function teacherApplicantsGetResult()
	{
		$conn = getConnection();
		$sql = "select * from applicantsteacher";
		$result = mysqli_query($conn, $sql);
		return $result;
	}
    function teacherApplicantsUniqueData($Email)
	{
		$conn = getConnection();
		$sql = "select * from applicantsteacher where Email='{$Email}'";
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
	function teacherApplicantsGetData($Email)
	{
		$conn = getConnection();
		$sql = "select * from applicantsteacher where Email='{$Email}'";
		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);

        if($count >0)
        {
            while($row = mysqli_fetch_assoc($result)) {
				$data = [
							'username' => $row['Name'],
							'email' => $row['Email'],
							'address' => $row['Address'],
							'division' => $row['Division'],
							'postcode' => $row['PostalCode'],
							'contnum' => $row['ContactNumber'],
							'gender' => $row['Gender'],
							'dob' => $row['DateOfBirth'],
							'bg' => $row['BloodGroup'],
							'cv' => $row['CVLocation'],
							'pic' => $row['PictureLocation'],
							'post' => $row['Post'],
						];
					return $data;
		}
		}
		else
		{
			return false;
		}
	}
	function ApplicantsRemove($Email)
	{
		$conn = getConnection();
		$sql = "DELETE from applicantsteacher WHERE Email = '{$Email}'";
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
