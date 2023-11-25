<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Bill</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Allura&family=Anton&family=Caveat&family=Josefin+Sans:ital,wght@1,300&family=Tilt+Prism&display=swap" rel="stylesheet">
    <style>
        /* Add your styles here */

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        #total {
            font-weight: bold;
        }

        .c1 {
            margin-top: 50px;
            background-color: #ffffff !important;
            box-shadow: 2px 2px 20px #ffa7a7;
        }

        .card-head h3 {
            display: grid;
            justify-content: center;
            margin-top: 8px;
            font-family: 'Josefin Sans', sans-serif;
        }

        .card-body label {
            font-family: 'Josefin Sans', sans-serif;
            font-weight: bolder;
            font-size: large;
        }

        .card-body input {
            border-radius: 8px;
        }

        .input {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 5px;
            align-items: center;
        }

        .input label {
            text-align: right;
        }

        .input input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .doctor input {
            width: 20%; /* Adjust as needed */
            padding: 8px;
            box-sizing: border-box;
        }

        .buttondetail {
            display: grid;
            margin-top: 10px;
            justify-content: start;
        }

        .centered-header {
            text-align: center;
        }

        #billTable th[colspan="6"] {
            text-align: left;
        }

        /* Media Queries for Responsive Design */
        @media screen and (max-width: 768px) {
            .input {
                grid-template-columns: 1fr;
            }

            .input label {
                text-align: left;
            }

            .doctor input {
                width: 100%; /* Adjust as needed */
            }
        }

        .buttondetail1 button{
            margin-left:20px;
        }


        @media print {
        body * {
            visibility: hidden;
        }

        #billTable, #billTable * {
            visibility: visible;
        }

        #billTable {
            position: absolute;
            left: 0;
            top: 0;
        }

        .urgentCheckbox{
            margin-top:5px;
        }
    }



   

        .card-body1 {
            background-color: green; /* Green color for Order Got */
            color: #fff; /* White text color */
        }

        .card-body2 {
            background-color: #6767ff; /* Green color for Order Got */
            color: #fff; /* White text color */
        }

        .card-head {
height:100px;    
display:grid;
justify-content:center; 
align-content:center;
font-weight: light;
font-size:40px; 
  }

  

.dateheading{
    margin-top:10px;
    display: grid;
            justify-content: center;
}

#todaysDate{
            font-size: 30px;
        font-weight:light;

}


.c4{
    background-color: #ffffff !important;
            box-shadow: 2px 2px 20px #ffa7a7;
}



    </style>
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
          <a class="nav-link active" aria-current="page" href="index.2">ORDER</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">DASHBOARD</a>
        </li>

      </ul>
    </div>
  </div>
</nav>

















<div class="container">
<div class="card c1">

<div class="card-head">
    <h3>  ORDER </h3>
</div>
<div class="card-body">

<div class="doctor">
<label for="DOCTOR">SELECT DOCTOR:</label>
    <input type="text" id="DOCTOR" placeholder="Type to search for DOCTOR">
    <label for="remark">REMARK:</label>
    <input type="text" id="remark">
    <label for="urgent">URGENT DELIVERY:</label>
    <input type="checkbox" id="urgentCheckbox" value="urgent"  style="margin-left:-110px"> </input>

    <hr>
</div>
    <div class="input">



    <label for="medicineInput">SELECT MEDICINE:</label>
    <input type="text" id="medicineInput" placeholder="Type to search for medicine">
    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" min="1" value="1">
    <label for="price">Price (per unit):</label>
    <input type="number" id="price" min="0" value="" step="0.01">
        <label for="remark">REMARK:</label>
    <input type="text" id="remark">
</div>


<div class="buttondetail">

    <button onclick="addItem()" class="btn btn-primary">Add Item</button>
    </div>
</div>




<div class="container">
<div id="fulltabledetail">
    <table id="billTable" class="table table-sm">
        <thead>
            <tr>
                <th colspan="6" class="centered-header">Ample Pharma Agency</th>
            </tr>
            <tr>
                <td colspan="6">TO: doctorname</td>
            </tr>
            <tr>
                <td>Medicine Name</td>
                <td>Quantity</td>
                <td>Price</td>
                <td>GST</td>
                <td>SGST</td>
                <td>Total Price</td>
            </tr>
        </thead>
        <tbody id="billBody">
            <!-- Existing or initially empty body -->
        </tbody>
        <tfoot>
            <tr>
                <td>Total</td>
                <td id="totalQuantity"></td>
                <td id="totalPrice"></td>
                <td id="totalGST"></td>
                <td id="totalSGST"></td>
                <td id="grandTotal"></td>
            </tr>
        </tfoot>
    </table>
</div>


    <div class="buttondetail1">

<button onclick="clearForm()" class="btn btn-primary"> clear </button>
<button id = "download"  onclick="printpage()"  class="btn btn-primary"> download</button>
<button onclick="saveVisit()" class="btn btn-primary"> save</button>

<br>
<br>

</div>

    <div class="input">
        <!-- Your input fields go here -->
    </div>
</div>


</div>

</div>




    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>  


const currentDate = new Date();

const day = currentDate.getDate().toString().padStart(2, '0');
const month = (currentDate.getMonth() + 1).toString().padStart(2, '0'); // Months are zero-based
const year = currentDate.getFullYear().toString().slice(-2); // Get the last 2 digits of the year
const formattedDate = `${day}/${month}/${year}`;






    $(document).ready(function () {
    // Configure the Autocomplete widget
    $('#medicineInput').autocomplete({
        source: function (request, response) {
            // Make an AJAX request to fetch medicine names from the server
            $.ajax({
                url: 'get_medicines.php', // Replace with the actual server endpoint
                method: 'GET',
                data: { term: request.term },
                dataType: 'json',
                success: function (data) {
                    response(data);
                },
                error: function () {
                    console.error('Error fetching medicine names from the server.');
                }
            });
        },
        minLength: 1, // Set the minimum length of input before triggering autocomplete
        select: function (event, ui) {
            // Handle selection if needed
            console.log('Selected Medicine:', ui.item.value);
        }
    });
});

$(document).ready(function () {
    // Configure the Autocomplete widget for doctors
    $('#DOCTOR').autocomplete({
        source: function (request, response) {
            // Make an AJAX request to fetch doctor names from the server
            $.ajax({
                url: 'getdoctor.php', // Replace with the actual server endpoint
                method: 'GET',
                data: { term: request.term },
                dataType: 'json',
                success: function (data) {
                    response(data);
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching doctor names from the server. Status:', status, 'Error:', error);
                }
            });
        },
        minLength: 1, // Set the minimum length of input before triggering autocomplete
        select: function (event, ui) {
            // Handle selection if needed
            console.log('Selected Doctor:', ui.item.value);
        }
    });

    // You can add more configurations or additional Autocomplete widgets for different inputs as needed.
});


    function addItem() {
    console.log('Add Item button clicked');

    const doctorname = $('#DOCTOR').val();
    const selectedMedicine = $('#medicineInput').val();
    const quantity = parseInt($('#quantity').val()) || 1;
    const price = parseFloat($('#price').val()) || 0;

    console.log('Selected Medicine:', selectedMedicine);
    console.log('Quantity:', quantity);
    console.log('Price:', price);
    console.log('doctorname:', doctorname);

    if (selectedMedicine && !isNaN(quantity) && !isNaN(price)) {
        const sgst = price * 0.05; // Assuming SGST is 5% of the price
        const cgst = price * 0.05; // Assuming CGST is 5% of the price
        const total = (price + sgst + cgst) * quantity;

        // Update total values
        updateTotals(quantity, price, sgst, cgst, total);
        $('table#billTable tr:eq(1) td[colspan="6"]').text('TO: ' + doctorname);
        // Append row to the table
        const row = `<tr>
                  
                        <td>${selectedMedicine}</td>
                        <td>${quantity}</td>
                        <td>${price.toFixed(2)}</td>
                        <td>${sgst.toFixed(2)}</td>
                        <td>${cgst.toFixed(2)}</td>
                        <td>${total.toFixed(2)}</td>
                    </tr>`;

        $('#billBody').append(row);
    } else {
        alert("Please select a medicine and fill in quantity and price with valid values.");
    }
    document.getElementById('medicineInput').value = '';
            document.getElementById('quantity').value = '';
            document.getElementById('price').value = '';
}

function updateTotals(quantity, price, sgst, cgst, total) {
    // Update total values in the footer
    const totalQuantity = parseFloat($('#totalQuantity').text()) || 0;
    const totalPrice = parseFloat($('#totalPrice').text()) || 0;
    const totalGST = parseFloat($('#totalGST').text()) || 0;
    const totalSGST = parseFloat($('#totalSGST').text()) || 0;
    const grandTotal = parseFloat($('#grandTotal').text()) || 0;

    $('#totalQuantity').text((totalQuantity + quantity).toFixed(2));
    $('#totalPrice').text((totalPrice + price).toFixed(2));
    $('#totalGST').text((totalGST + sgst).toFixed(2));
    $('#totalSGST').text((totalSGST + cgst).toFixed(2));
    $('#grandTotal').text((grandTotal + total).toFixed(2));
}
function clearForm() {
            // Clear text fields
            document.getElementById('DOCTOR').value = '';
            document.getElementById('medicineInput').value = '';
            document.getElementById('quantity').value = '';
            document.getElementById('price').value = '';


            $('#billBody').empty(); // Removes all child elements of the tbody
    // Reset total values to zero
    $('#totalQuantity').text('0.00');
    $('#totalPrice').text('0.00');
    $('#totalGST').text('0.00');
    $('#totalSGST').text('0.00');
    $('#grandTotal').text('0.00');
}


function printpage() {
        const elementId = 'billTable';
        const element = document.getElementById(elementId);

        if (element) {
            window.print();
        } else {
            console.error(`Element with ID "${elementId}" not found.`);
        }
    } 




    function saveVisit() {
    // Assuming you have some data to send
const doctorName = document.getElementById('DOCTOR').value;
const remark = document.getElementById('remark').value;
const urgent = document.getElementById('urgent');
const currentDate = new Date();
let status;

// Get individual components
 const year = currentDate.getFullYear();
    const month = (currentDate.getMonth() + 1).toString().padStart(2, '0'); // Month is zero-based
    const day = currentDate.getDate().toString().padStart(2, '0');
    const formattedDate = `${year}-${month}-${day}`;

// Format time without seconds
const timeOptions = { hour: '2-digit', minute: '2-digit', hour12: false };
const formattedTime = new Intl.DateTimeFormat('en-US', timeOptions).format(currentDate);

console.log('Formatted Date:', formattedDate);
console.log('Formatted Time:', formattedTime);

const urgentCheckbox = document.getElementById('urgentCheckbox');

if (urgentCheckbox.checked) {
        // If checked, add logic for urgent case
        const urgentCheckbox1= document.getElementById('urgentCheckbox').value;
    status = 'urgent';
}
        
        // Add your logic to add medicine detail for urgent case here
     else {
        status = 'pending';
      
    }


    const data = {
    doctorName: doctorName,
    date: formattedDate,
    remark:remark,
    status:status,
    time:formattedTime
};

// Prepare data to send to the server


// Send the POST request
// Assuming 'data' contains your doctorName, date, and time

fetch('save_visit.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify(data),
})
    .then(response => response.json())
    .then(data => {
        console.log('Response from save_visit.php:', data);
        if (data.status === 'success') {
            const oid = data.oid;
            console.log('OID:', oid);
            // Call your productdetail function and pass the OID if needed
            productdetail(oid);
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error in save_visit.php:', error);
    });

    }
    function productdetail(oid) {
    const tableDetails = [];

    // Retrieve the header details
    const headerRow = $('#billTable thead tr:last');
    const headerColumns = headerRow.find('td');

    // Retrieve the table body details
    const tableRows = $('#billTable tbody tr');
    tableRows.each(function () {
        const rowData = {};
        const columns = $(this).find('td');
        columns.each(function (index) {
            const columnName = headerColumns.eq(index).text().trim();
            const columnValue = $(this).text().trim();
            rowData[columnName] = columnValue;
        });
        tableDetails.push(rowData);
    });

    // Log the full table details for debugging
    console.log('Full Table Details:', tableDetails);

    // Assuming the fetch code is correct, proceed with sending data to the server
    fetch('save_bill.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ oid: oid, medicineDetails: tableDetails }),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Response from save_bill.php:', data);
        // Handle the response as needed
    })
    .catch(error => {
        console.error('Error in save_bill.php:', error);
    });
}


    

            </script>

</body>
</html>
