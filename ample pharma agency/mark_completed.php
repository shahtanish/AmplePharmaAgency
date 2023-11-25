<?php

header('Content-Type: application/json');

$inputData = json_decode(file_get_contents('php://input'), true);

$oid = isset($inputData['oid']) ? $inputData['oid'] : null;

// Check if required data is present
if (!$oid) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
    exit;
}

// Update the status to 'completed'
$servername = "localhost";
$username = "root";
$password = "shahtanish@123";
$dbname = "amplepharma";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "UPDATE ordermaster SET status = 'completed' WHERE oid = $oid";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['status' => 'success', 'message' => 'Order marked as completed']);
} else {
    echo json_encode(['status' => 'error', 'message' => $conn->error]);
}

$conn->close();

?>
