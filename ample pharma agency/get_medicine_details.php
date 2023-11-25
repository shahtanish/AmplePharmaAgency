<?php
$servername = "localhost";
$username = "root";
$password = "shahtanish@123";
$dbname = "amplepharma";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$medicineId = $_GET['id'];

$sql = "SELECT medname as name FROM med_detail WHERE mid = $medicineId"; // Adjust column names
$result = $conn->query($sql);

// Check for errors
if ($result === false) {
    error_log('Error executing database query: ' . $conn->error);
    echo json_encode(['error' => 'Error executing database query']);
    exit(); // Stop script execution
}

// Fetch and return data if available

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    http_response_code(404); // Set HTTP status code to 404 Not Found
    echo json_encode(['error' => 'No data found']);
}

header('Content-Type: application/json');
$conn->close();
?>
