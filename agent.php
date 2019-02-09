<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="policy.css">
</head>
<body>
<h1><center>INFO OF AGENT</center></h1><br/>
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
$sql = "SELECT * FROM  insurance2 where Agent_ID=\"$id\" AND Agent_name=\"$name\"";
if($result = mysqli_query($conn,$sql)){
if (mysqli_num_rows($result) > 0)
{
	echo "Company_name &nbsp;Sum_Insured&nbsp;Key_Features&nbsp;Stars&nbsp;Premium";
	while($row = mysqli_fetch_assoc($result))
	{
		echo "<br>" . " " . $row['Agent_ID'] . "<br>" . "Agent name: " . $row['Agent_name'] . "<br>" . "credit card number:" . $row['Credit_card'] . "<br>" . "DOB: " . $row['DOB'] . "<br>" . "Sex: " . $row['SEX'] . "<br>" . "Occupation: " . $row['Occupation'] . "<br>" . "Income: " . $row['Income'] . "<br>" . "Address: " . $row['Address'] . "<br>" . "Mob no: " . $row['mobile_no'] . "<br>" . "Email id: " . $row['Email_Id'] . "<br>";
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