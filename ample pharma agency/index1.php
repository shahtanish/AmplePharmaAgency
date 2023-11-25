<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Bill</title>
    <style>
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
    </style>
</head>
<body>

    <h1>Medicine Bill</h1>

    <table id="medicineTable">
        <thead>
            <tr>
                <th>Medicine Name</th>
                <th>Quantity</th>
                <th>Price (per unit)</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Items will be dynamically added here -->
        </tbody>
    </table>

    <?php	

$conn = mysqli_connect('localhost', 'root','shahtanish@123','amplepharma');

if(!$conn){  
 die('could not connect: '.mysqli_connect_error());  
}

$sql1 = "select * from med_detail ";  
$retval= mysqli_query($conn,$sql1);  
 
if (mysqli_num_rows($retval) > 0) {   	
   $counter = 1; // Counter to create unique IDs
   while ($row = mysqli_fetch_assoc($retval)) {
       $cardId = 'card' . $counter;
       
?>

    <label for="medicineName">Medicine Name:</label>
    <input type="text" id="medicineName">



    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" min="1" value="1">

    <label for="price">Price (per unit):</label>
    <input type="number" id="price" min="0" step="0.01">

    <button onclick="addItem()">Add Item</button>

    <p id="total">Total:0.00</p>

    <script>
        function addItem() {
            const medicineName = document.getElementById("medicineName").value;
            const quantity = parseInt(document.getElementById("quantity").value);
            const price = parseFloat(document.getElementById("price").value);

            if (medicineName && !isNaN(quantity) && !isNaN(price)) {
                const total = quantity * price;

                // Create a new row for the table
                const table = document.getElementById("medicineTable").getElementsByTagName('tbody')[0];
                const newRow = table.insertRow(table.rows.length);

                // Add data to the row
                const cell1 = newRow.insertCell(0);
                const cell2 = newRow.insertCell(1);
                const cell3 = newRow.insertCell(2);
                const cell4 = newRow.insertCell(3);
                const cell5 = newRow.insertCell(4);

                cell1.innerHTML = medicineName;
                cell2.innerHTML = quantity;
                cell3.innerHTML = `${price.toFixed(2)}`;
                cell4.innerHTML = `${total.toFixed(2)}`;
                cell5.innerHTML = '<button onclick="removeItem(this)">Remove</button>';

                // Update total
                updateTotal();
            } else {
                alert("Please fill in all the fields with valid values.");
            }
        }

        function removeItem(button) {
            const row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
            updateTotal();
        }

        function updateTotal() {
            const table = document.getElementById("medicineTable").getElementsByTagName('tbody')[0];
            const rows = table.getElementsByTagName('tr');
            let total = 0;

            for (let i = 0; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                total += parseFloat(cells[3].innerText.replace('$', ''));
            }

            document.getElementById("total").innerText = `Total: ${total.toFixed(2)}`;
        }
    </script>

</body>
</html>
