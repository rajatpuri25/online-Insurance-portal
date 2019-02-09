<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="policy.css">
</head>
<body>	
	<br/>
<h1><center>INFO OF Policy holder</center></h1><br/><hr>
<div>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "insurance";
$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
	die("connection failed: " . mysqli_connect_error());
}
$id = $_POST['pwd'];
$name = $_POST['username'];
$sql = "SELECT * FROM  policyholder where PH_ID=\"$id\" AND PH_name=\"$name\"";
if($result = mysqli_query($conn,$sql)){
if (mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		echo "Policy holder ID:  " . $row['PH_id'] . "<br><br>" . "PH_name:  " . $row['PH_name'] . "<br><br>" . "Policy_name:  " . $row['Policy_name'] . "<br><br>" . "Premium:  " .  $row['Premium'] . "<br><br>" . "Agent id:  " . $row['Agent_ID'] . "<br><br>" . "Reg_date: " . $row['Reg_date'] . "<br><br>" . "Due_date:  " . $row['Due_date'] . "<br><br>" . "Agent id: " . $row['Agent_ID'] . "<br><br>" . "DOB:  " . $row['DOB'] . "<br><br>" . "Sex:  " . $row['SEX'] . "<br><br>" . "Occupation:  " . $row['Occupation'] . "<br><br>" . "Income:  " . $row['Income'] . "<br><br>" . "Address:  " . $row['Address'] . "<br><br>" . "Mob no:  " . $row['mobile_no'] . "<br><br>" . "Email id:  " . $row['Email_Id'] . "<br><br>";
	} 
}
else
{
	echo "Wrong username or password !" . "<br>";
}
}
else
{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
mysqli_close($conn);
?>
</div>
</body>
</html>