<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "manas";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sum = $_POST['sum'];
echo "value of sum is :" . $sum . "<br>";
if($sum==3)
{
$sql = "SELECT * FROM amount5 where Sum_Insured=3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Insurance Plan: " . $row["Insurance_Plan"] . "<br>" . "  Sum: " . $row["Sum_Insured"] . "<br>" . "Features: " . $row["Key_Features"] . "<br>" . " stars: " . $row["Stars"] . "<br>" . "premium: " . $row["Premium"] . "<br>";
    }
}
} 

else {
    echo "0 results";
}
$conn->close();
?>