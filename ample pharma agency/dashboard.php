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
    <title>Medicine Bill</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Allura&family=Anton&family=Caveat&family=Josefin+Sans:ital,wght@1,300&family=Tilt+Prism&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
        
       

   

        .card-body {
            padding: 20px;
        }

         .card {
             margin: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        overflow: hidden;
    }

    .box{
        display:grid;
        grid-template-columns: repeat(4, 300px ); 
        grid-gap: 10px;
    }


    @media screen and (max-width: 500px) {
        .box{
         display:grid;
         grid-template-columns: repeat(2, 170px); 
    
    }
    .container{
        margin-right:20px;
    }

    tbody input{
        width:110px;
    }


    
    }
    .card-head {
        height: 100px;
        display: grid;
        justify-content: center;
        align-content: center;
        font-weight: light;
        font-size: 40px;
    }
    .card-headfilter {
    
   
    }
    

    .card-headnav {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

    .card-body1 {
        background-color: green;
        color: #fff;
    }

    .card-body2 {
        background-color: #6767ff;
        color: #fff;
    }




    .c4 {
        background-color: #ffffff !important;
        box-shadow: 2px 2px 20px #ffa7a7;
    } 


        .head{
            display:flex;
            justify-content:center;
            align-item:center;
            font-weight:bold;
            font-size:large;
        }
</style>

</head>
<body>





<nav class="navbar navbar-expand-lg navbar-dark bg-danger ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">AMPLE PHARMA AGENCY</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index2.php">ORDER</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">DASHBOARD</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>


<div class="container" style="margin-top:50px;">
    <div class="card">
        <div class=" card-headfilter" style="background-color: white;color:black;">
          <div class="card-body">

            <div class="input">
            <div class="table-responsive-sm">
                <table class="table table-bordered table-sm"">
            <form method="GET" >

                <thead>
    <tr>
      <th scope="col"> FROM DATE</th>
      <th scope="col">TO DATE</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      <td> <input type="date" name="from_date"   > </input></td>
      <td> <input type="date" name="to_date" ></input></td>
     
      <td><button class="btn btn-danger">SUBMIT </button></td>
    </tr>
    
  </tbody>
  </form>
</table>
    </div>
<?php
$servername = "localhost";
$username = "root";
$password = "shahtanish@123";
$dbname = "amplepharma";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$fromDate = $_GET['from_date'] ?? '';
$toDate = $_GET['to_date'] ?? '';
echo "you are in ";

// Construct WHERE clause for date filtering
$dateFilter = "";
if ($fromDate && $toDate) {
    $dateFilter = " AND tdate BETWEEN '$fromDate' AND '$toDate'";
}

// Calculate Pending Orders
$pendingQuery = "SELECT COUNT(*) AS pendingCount FROM ordermaster WHERE status = 'pending' $dateFilter;";
$pendingResult = $conn->query($pendingQuery);
$pendingCount = $pendingResult->fetch_assoc()['pendingCount'];

// Calculate Completed Orders
$completedQuery = "SELECT COUNT(*) AS completedCount FROM ordermaster WHERE status = 'completed' $dateFilter;";
$completedResult = $conn->query($completedQuery);
$completedCount = $completedResult->fetch_assoc()['completedCount'];

// Calculate Urgent Orders
$urgentQuery = "SELECT COUNT(*) AS urgentCount FROM ordermaster WHERE status = 'urgent' $dateFilter;";
$urgentResult = $conn->query($urgentQuery);
$urgentCount = $urgentResult->fetch_assoc()['urgentCount'];

// Calculate Total Orders
$totalQuery = "SELECT COUNT(*) AS totalCount FROM ordermaster WHERE status IN ('pending', 'urgent') $dateFilter;";
$totalResult = $conn->query($totalQuery);
$totalCount = $totalResult->fetch_assoc()['totalCount'];

// Close connection
$conn->close();
?>

<div class="box">

<div class="card c4">
    <div class="card-head">
        <p><?php echo $totalCount; ?></p>
    </div>
    <div class="card-body card-body1" style="background-color:#b20000;color:white;">
        <h4>TOTAL ORDER</h4>
    </div>
</div>

<div class="card c4">
    <div class="card-head" onclick="orderdetail('<?php echo $fromDate; ?>', '<?php echo $toDate; ?>')">
        <p><?php echo $pendingCount; ?></p>
    </div>
    <div class="card-body" style="background-color:#565656;color:white;">
        <h4>NON URGENT ORDER</h4>
    </div>
</div>





<div class="card c4">
    <div class="card-head" onclick="orderdetail1('<?php echo $fromDate; ?>', '<?php echo $toDate; ?>')">
        <p><?php echo $urgentCount; ?></p>
    </div>
    <div class="card-body " style="background-color:#ff8080;color:white;">
        <h4>URGENT ORDER </h4>
    </div>
</div>





<div class="card c4">
<div class="card-head"  onclick="orderdetail2('<?php echo $fromDate; ?>', '<?php echo $toDate; ?>')">
    <p><?php echo $completedCount; ?></p>
 </div>
 <div class="card-body" style="background-color:#7e7eff;color:white;">
    <h4>ORDER COMPLETED</h4>
</div>
</div>

</div>
</div>




</div>






<div class="container" style="margin-top:50px;">
    <div class="card">
        <div class=" card-headfilter" style="background-color: white;color:black;">
       
        </div>
    </div>
</div>

<div class="head">
<p> INCOMING ORDER ANALYSIS </p>          
</div>

<div class="input">

<canvas id="dailyIncomingOrdersBarChart"></canvas>

</div>



    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>  

function orderdetail(fromDate, toDate) {
    var url = 'http://localhost/ample%20pharma%20agency/order.php';
    url += '?fromDate=' + encodeURIComponent(fromDate);
    url += '&toDate=' + encodeURIComponent(toDate);

    // Redirect to the constructed URL
    window.location.href = url;}
function orderdetail1(fromDate, toDate) {
    var url = 'http://localhost/ample%20pharma%20agency/order2.php';
    url += '?fromDate=' + encodeURIComponent(fromDate);
    url += '&toDate=' + encodeURIComponent(toDate);

    // Redirect to the constructed URL
    window.location.href = url;}

function orderdetail2(fromDate, toDate) {
    var url = 'http://localhost/ample%20pharma%20agency/order3.php';
    url += '?fromDate=' + encodeURIComponent(fromDate);
    url += '&toDate=' + encodeURIComponent(toDate);

    // Redirect to the constructed URL
    window.location.href = url;
}

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
