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

// Fetch medicine names based on the user's input
$term = $_GET['term'];
$sql = "SELECT medname FROM med_detail WHERE medname LIKE '%$term%'";
$result = $conn->query($sql);

$medicineNames = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $medicineNames[] = $row['medname'];
    }
}

echo json_encode($medicineNames);

$conn->close();
?>
