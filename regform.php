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

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sum=$_POST['sum'];
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