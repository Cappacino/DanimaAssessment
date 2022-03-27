<?php
$servername = "MYSQL5045.site4now.net";
$username = "a655c4_danima";
$password = "danima123";
$dbname = "db_a655c4_danima";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "SELECT contactName, contactEmail, contactPhone FROM Contacts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Name: " . $row["contactName"]. " - Email: " . $row["contactEmail"]. " - Phone: " . $row["contactPhone"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>