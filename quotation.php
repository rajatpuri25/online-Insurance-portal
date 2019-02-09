<!DOCTYPE html>
<html>
<head>
<style>
		table, th, td 
		{
    		border: 1px solid black;
    		border-collapse: collapse;
    		padding: 15px;
		}
		th
		{
			background-color: lightgreen;
		}
		td
		{
			background-color: lightgrey;
		}
		table
		{
			margin-left: 27%;
		}
		body
		{
			background-color: lightblue;
		}
</style>
</head>
<body>
	<div>
<h1><center>POLICY DETAILS</center></h1><br/>
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
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$email = $_POST['email'];
$occ = $_POST['occupation'];
$sal = $_POST['salary'];
$sum = $_POST['sum'];
$sql1 = "insert into regtable values(\"$fname\",\"$lname\",\"$age\",\"$email\",\"$occ\",\"$sal\",\"$sum\")";
$result1 = $conn->query($sql1);
$sql = "SELECT * FROM  newcoustomer where Sum_Insured=\"$sum\"";
if($result = mysqli_query($conn,$sql)){
	echo '<table>';
if (mysqli_num_rows($result) > 0)
{
	echo "<tr><th>Company Name</th><th>Sum Insured</th><th>Key Features</th><th>Stars</th><th>Premium</th></tr>"; 
	while($row = mysqli_fetch_assoc($result))
	{
		echo "<tr><td>" . $row['Company_Name'] . "</td><td>" . $row['Sum_Insured'] . "</td><td>" . $row['Key_Features'] . "</td><td>" . $row['Stars'] . "</td><td>" . $row['Premium'] . "</td></tr>"; 
	} 
	echo '</table>';
}
else
{
	echo "wrong sum input !" . "<br>";
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