<?php
// getData.php

$conn = mysqli_connect('localhost', 'root', 'shahtanish@123', 'amplepharma');

if (!$conn) {
    die('could not connect: ' . mysqli_connect_error());
}

$sql = "SELECT * FROM med_detail";
$retval = mysqli_query($conn, $sql);

$data = array();

if (mysqli_num_rows($retval) > 0) {
    while ($row = mysqli_fetch_assoc($retval)) {
        $data[] = $row;
    }
}

echo json_encode($data);

mysqli_close($conn);
?>
