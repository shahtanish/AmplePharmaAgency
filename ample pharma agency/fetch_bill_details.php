<?php

header('Content-Type: application/json');

$inputData = json_decode(file_get_contents('php://input'), true);

$oid = isset($inputData['oid']) ? $inputData['oid'] : null;

// Check if required data is present
if (!$oid) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
    exit;
}

// Fetch details for the specified OID from the database
// Modify this query based on your database structure
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT mname, quantity, price, gst, sgst, total FROM productmaster WHERE oid = $oid";
$result = $conn->query($sql);

if ($result) {
    $details = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode(['status' => 'success', 'details' => $details]);
} else {
    echo json_encode(['status' => 'error', 'message' => $conn->error]);
}

$conn->close();

?>
