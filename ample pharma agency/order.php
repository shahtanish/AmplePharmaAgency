<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Allura&family=Anton&family=Caveat&family=Josefin+Sans:ital,wght@1,300&family=Tilt+Prism&display=swap" rel="stylesheet">
<link href="css/style4.css" rel = "stylesheet">
   
    <title>Document</title>
</head>
<body>
<!-- navbar -->

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
<div class="container">
    <div class="card">
        <div class="card-head" style="background-color:violet;">
            pending order detail
        </div>
      
    </div>


    
    <?php
$conn = mysqli_connect('localhost', 'root', 'shahtanish@123', 'amplepharma');
    
$fromDate = isset($_GET['fromDate']) ? $_GET['fromDate'] : '';
$toDate = isset($_GET['toDate']) ? $_GET['toDate'] : '';

// Validate and sanitize user input (you should perform more thorough validation)
$fromDate = mysqli_real_escape_string($conn, $fromDate);
$toDate = mysqli_real_escape_string($conn, $toDate);

// Construct the SQL query
$sql1 = "SELECT * FROM ordermaster WHERE status = 'pending' AND tdate BETWEEN '$fromDate' AND '$toDate'";
$retval = mysqli_query($conn, $sql1);

if (mysqli_num_rows($retval) > 0) {
    $counter = 1; // Initialize a counter for unique IDs
    while ($row = mysqli_fetch_assoc($retval)) {
        ?>
        <div class="card">
            <div class="card-body">
            <p id="doctorName" class="doctor-name" onclick="toggleDetails('details<?php echo $counter; ?>', <?php echo $row['oid']; ?>)">                    <?php echo $row['dname']; ?> <span class="toggle-details">+</span>
                </p>
                <span style="color:black;font-size:20px;margin-left:10px;"><?php echo $row['tdate']; ?> </span>
                <span style="color:black;font-size:20px;margin-left:10px;font-weight:bold;">(<?php echo $row['remark']; ?>)</span>
                
                <input type="hidden" value="<?php echo $row['oid']; ?>">
                <div id="details<?php echo $counter; ?>" class="details-container">
                <?php
    if (isset($details) && is_array($details) && count($details) > 0) {
        echo '<p>Details for ' . $row['medname'] . '</p>';
        echo '<table>';
        echo '<tr><th>Medicine Name</th><th>Quantity</th><th>Price</th><th>GST</th><th>SGST</th><th>Total</th></tr>';

        foreach ($details as $detail) {
            echo '<tr>';
            echo '<td>' . $detail['medname'] . '</td>';
            echo '<td>' . $detail['quantity'] . '</td>';
            echo '<td>' . $detail['price'] . '</td>';
            echo '<td>' . $detail['gst'] . '</td>';
            echo '<td>' . $detail['sgst'] . '</td>';
            echo '<td>' . $detail['total'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';

} else {
    echo '<p>No details available for ' . $row['dname'] . '</p>';
}
?>
</div>
            </div>
        </div>
        <?php
        $counter++; // Increment the counter for the next iteration
    }
}
?>

    <!-- Add more cards as needed for each doctor -->
</div>

<script>
function toggleDetails(detailsId, oid) {
    console.log(oid);
    console.log(detailsId);

    var detailsContainer = document.getElementById(detailsId);

    // Toggle visibility
    detailsContainer.style.display = detailsContainer.style.display === 'none' ? 'block' : 'none';

    if (detailsContainer.style.display === 'block') {
console.log(oid);

        // Fetch and display details when details are expanded
        fetchDetails(oid, detailsId);
    }
}

function fetchDetails(oid, detailsId) {
    

fetch('fetch_product_details.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify({ oid: oid }), // Include the 'oid' in the request body
})
    .then(response => response.json())
    .then(data => {
        console.log('Details received:', data);

        if (data.status === 'success') {
            formatDetails(data.details,detailsId,oid);
        } else {
            console.error('Error fetching details:', data.message);
        }
    })
    .catch(error => {
        console.error('Error fetching details:', error);
    });
}
function formatDetails(details, detailsContainerId, oid) {
    const detailsContainer = document.getElementById(detailsContainerId);
        if (detailsContainer) {
        // Clear previous content
        detailsContainer.innerHTML = '';

        // Create table element
        const table = document.createElement('table');
        table.classList.add('table');

        // Create table header
        const thead = document.createElement('thead');
        const headerRow = document.createElement('tr');
        headerRow.innerHTML = '<th>Medicine Name</th><th>Quantity</th><th>Price</th><th>GST</th><th>SGST</th><th>Total</th>';
        thead.appendChild(headerRow);
        table.appendChild(thead);

        // Create table body
        const tbody = document.createElement('tbody');
        details.forEach(detail => {
            const row = document.createElement('tr');
            row.innerHTML = `<td>${detail.medname}</td>
                             <td>${detail.quantity}</td>
                             <td>${detail.price}</td>
                             <td>${detail.gst}</td>
                             <td>${detail.sgst}</td>
                             <td>${detail.total}</td>`;
            tbody.appendChild(row);
        });
        table.appendChild(tbody);

        // Append the table to the details container
        detailsContainer.appendChild(table);

        // "Completed" button
        const completedButton = document.createElement('button');
        completedButton.innerText = 'Completed';
        completedButton.classList.add('btn', 'btn-primary');
        completedButton.onclick = function () {
            markCompleted(oid);
        };

        detailsContainer.appendChild(completedButton);
    } else {
        console.error('Details container not found:', detailsContainerId);
    }
}


function markCompleted(oid) {
    // Send the POST request to mark_completed.php
    console.log(oid);
    fetch('mark_completed.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ oid: oid }), // Include the 'oid' in the request body
    })
        .then(response => response.json())
        .then(data => {
            console.log('Response from mark_completed.php:', data);
            if (data.status === 'success') {
                // Refresh the page or update the UI as needed
                alert(data.message);
            } else {
                alert('Error marking order as completed: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error in mark_completed.php:', error);
        });
}



</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>