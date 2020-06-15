<?php
//Conect DB



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Task";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "id: ".$row["id"]." start:".$row["start"]." end:".$row["end"]."<br>";
}
} else {
echo "0 results";
}
$conn->close();
?>
