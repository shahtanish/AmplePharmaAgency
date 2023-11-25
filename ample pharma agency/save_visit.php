<?php

header('Content-Type: application/json');

$inputData = json_decode(file_get_contents('php://input'), true);

$doctorName = $inputData['doctorName'];
$date = $inputData['date'];
$time = $inputData['time'];
$status = $inputData['status'];
$remark = $inputData['remark'];


$servername = "localhost";
$username = "root";
$password = "shahtanish@123";
$dbname = "amplepharma";

$conn = new mysqli($servername, $username, $password, $dbname);


$sql = "INSERT INTO ordermaster (dname, tdate, ttime, status, remark) VALUES ('$doctorName', '$date', '$time', '$status', '$remark')";

if ($conn->query($sql) === TRUE) {
    $oid = $conn->insert_id; // Get the auto-incremented OID
    echo json_encode(['status' => 'success', 'message' => 'Visit saved successfully', 'oid' => $oid]);
} else {
    $errorMessage = 'Error saving visit: ' . $conn->error;
    error_log($errorMessage);
    echo json_encode(['status' => 'error', 'message' => $errorMessage]);
}

$conn->close();
?>
