<?php
// Replace this with your database connection code
$servername = "localhost";
$username = "root";
$password = "shahtanish@123";
$dbname = "amplepharma";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch doctor names based on the user's input
$term = $_GET['term'];
$sql = "SELECT dname FROM doctormaster WHERE dname LIKE '%$term%'";
$result = $conn->query($sql);

$doctorNames = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $doctorNames[] = $row['dname'];
    }
}

echo json_encode($doctorNames);

$conn->close();
?>
