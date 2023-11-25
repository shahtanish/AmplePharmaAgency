<?php
$servername = "localhost";
$username = "root";
$password = "shahtanish@123";
$dbname = "amplepharma";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$currentMonth = date('m');
$currentYear = date('Y');

$sql = "SELECT
            tdate,
            COUNT(*) AS incoming_orders
        FROM
            ordermaster
        WHERE
            MONTH(tdate) = MONTH(CURDATE())
        GROUP BY
            tdate";

$result = $conn->query($sql);

$barChartData = [
    'labels' => [],
    'incomingOrders' => [],
];

while ($row = $result->fetch_assoc()) {
    $barChartData['labels'][] = $row['tdate'];
    $barChartData['incomingOrders'][] = $row['incoming_orders'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Incoming Orders Bar Chart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<canvas id="dailyIncomingOrdersBarChart"></canvas>
<script>
    var ctx = document.getElementById('dailyIncomingOrdersBarChart').getContext('2d');

    var dailyIncomingOrdersBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($barChartData['labels']); ?>,
            datasets: [{
                label: 'Incoming Orders',
                data: <?php echo json_encode($barChartData['incomingOrders']); ?>,
                backgroundColor: 'rgba(255, 99, 132, 0.7)', // Bootstrap Danger Color
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: [{
                    type: 'time',
                    time: {
                        unit: 'day',
                        displayFormats: {
                            day: 'MMM D'
                        }
                    },
                    ticks: {
                        source: 'labels' // This line is added to resolve the issue
                    }
                }],
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</body>
</html>
