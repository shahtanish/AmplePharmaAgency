<?php

header('Content-Type: application/json');

$inputData = json_decode(file_get_contents('php://input'), true);

$oid = isset($inputData['oid']) ? $inputData['oid'] : null;
$medicineDetails = isset($inputData['medicineDetails']) ? $inputData['medicineDetails'] : null;

// Check if required data is present
if (!$oid || !$medicineDetails) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
    exit;
}

// Assuming you have a database connection
$servername = "localhost";
$username = "root";
$password = "shahtanish@123";
$dbname = "amplepharma";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check database connection
if ($conn->connect_error) {
    $errorMessage = "Database connection failed";
    echo json_encode(['status' => 'error', 'message' => $errorMessage]);
    exit;
}

// Insert data into the database
foreach ($medicineDetails as $medicine) {
    $mname = $medicine['Medicine Name'];
    $price = $medicine['Price'];
    $quantity = $medicine['Quantity'];
    $gst = $medicine['GST'];
    $sgst = $medicine['SGST'];
    $total = $medicine['Total Price'];

    $sql = "INSERT INTO productmaster ( oid, medname, price, quantity, gst, sgst, total)
            VALUES ( '$oid', '$mname',  '$price','$quantity', '$gst', '$sgst', '$total')";

    if ($conn->query($sql) !== TRUE) {
        $errorMessage = 'Error inserting data: ' . $conn->error;
        echo json_encode(['status' => 'error', 'message' => $errorMessage]);
        exit;
    }


}

// Close the database connection
$conn->close();

// Display the received data
echo json_encode([
    'status' => 'success',
    'message' => 'Data received and inserted successfully',
    'oid' => $oid,
    'mname' => $mname,
    'price' => $price,
    'quantity' => $quantity,
    'gst' => $gst,
    'sgst' => $sgst,
    'total' => $total
    



]);

?>
