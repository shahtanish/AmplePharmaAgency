function toggleSelection(cardId) {
    var card = document.getElementById(cardId);

    // Check if the card element exists
    if (!card) {
        console.error(`Card with ID ${cardId} not found.`);
        return;
    }

    card.classList.toggle('selected');

    // Get details from the card
    var medicineName = card.querySelector('h5').innerText;

    // Make an XMLHttpRequest to fetch data from the server
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'js/getdata.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Parse the JSON response
            var data = JSON.parse(xhr.responseText);

            // Find the entry in the data array that matches the medicineName
            var entry = data.find(entry => entry.medname === medicineName);

            // Check if entry is found
            if (entry) {
                var price = entry.price;
                var allowedQuantity = entry.quantity;

                // Create a text input for the quantity
                var userQuantity = window.prompt(`Medicine: ${medicineName}\nPrice: ${price}\nQuantity: ${allowedQuantity}`);

                // Check if userQuantity is not null (i.e., user clicked OK)
                if (userQuantity !== null) {
                    userQuantity = parseInt(userQuantity);

                    // Check if the user quantity is a valid number
                    if (!isNaN(userQuantity)) {
                        // Check if the user quantity exceeds the allowed quantity
                        if (userQuantity > allowedQuantity) {
                            alert(`Quantity cannot exceed ${allowedQuantity}.`);
                            // Remove the 'selected' class to undo the selection
                            card.classList.remove('selected');
                        } else {


                            
                        // Add quantity as a data attribute to the card
                        card.setAttribute('data-quantity', userQuantity);
                        card.setAttribute('data-price', price);
                        price
                            var alertMessage = `Medicine: ${medicineName}\nPrice: ${price}\nQuantity: ${userQuantity}`;
                            alert(alertMessage);

                            // Change the background color of the selected card
                            if (card.classList.contains('selected')) {
                                card.style.backgroundColor = 'lightblue';
                            } else {
                                card.style.backgroundColor = ''; // Reset to default background color
                            }
                        }
                    } else {
                        // User entered a non-numeric value
                        alert('Please enter a valid quantity.');
                        // Remove the 'selected' class to undo the selection
                        card.classList.remove('selected');
                    }
                } else {
                    // User clicked Cancel in the prompt
                    console.log('User canceled quantity entry.');
                }
            } else {
                console.error('Entry not found for medicine: ' + medicineName);
            }
        }
    };

    // Send the XMLHttpRequest
    xhr.send();
}

function nextStep(step) {
    console.log('Next Step: ', step);

    // Hide all steps
    document.getElementById('step1').style.display = 'none';
    document.getElementById('step2').style.display = 'none';
    document.getElementById('step3').style.display = 'none';
    var stepIndicator = document.getElementById('stepIndicator').children;
    for (var i = 0; i < stepIndicator.length; i++) {
        stepIndicator[i].classList.remove('active');
    }
    stepIndicator[step - 1].classList.add('active');



    
   
    // Show the next step based on the parameter
    if (step === 2) {
        console.log('Displaying step 2');

        // Retrieve and parse the selected card information
        var selectedCards = getSelectedCardsInfo();

        // Get the selected doctor's name
        var doctorSelect = document.getElementById('doctorName');
        var doctorName = doctorSelect.options[doctorSelect.selectedIndex].value;

        // Add doctorName to each selected card
        selectedCards.forEach(function (selectedCard) {
            selectedCard.doctorName = doctorName;
        });

        // Display the selected card information in the bill
        displayBill(selectedCards);

        // Now you have both the selected card information and the doctor's name
        document.getElementById('step2').style.display = 'block';
    }
    
    else if(step === 3)  {
        console.log('Displaying step 3');
    
        document.getElementById('step3').style.display = 'block';
      }


}

function getSelectedCardsInfo() {
    // Get all selected cards
    var selectedCards = document.querySelectorAll('.card.selected');
    var selectedCardsInfo = [];

    // Loop through selected cards and extract information
    selectedCards.forEach(function (selectedCard) {
        var medicineName = selectedCard.querySelector('h5').innerText;
        var cardId = selectedCard.id;
        var quantity = parseInt(selectedCard.getAttribute('data-quantity'));
        var price = parseInt(selectedCard.getAttribute('data-price'));
        
        // You can add more details as needed

        // Add the card information to the array
        selectedCardsInfo.push({
            cardId: cardId,
            medicineName: medicineName,
            quantity: quantity,
            price:price
            // Add more properties as needed
        });
    });

    return selectedCardsInfo;
}

function displayBill(selectedCards) {
    // Example: Display the selected information in the console
    console.log('Generated Bill Information:', selectedCards);

    // You can create a table or use any other HTML structure to display the bill
    var billTable = document.getElementById('billTable');
    billTable.innerHTML = ''; // Clear the table

    // Calculate the number of columns
    var numColumns = 7; // Increase the number of columns for the doctor's name

    // Create a row for the shop name
    var shopNameRow = billTable.insertRow(0);
    var shopNameCell = shopNameRow.insertCell();
    shopNameCell.colSpan = numColumns; // Make the cell span all columns
    shopNameCell.style.textAlign = 'center'; // Center-align the text
    shopNameCell.innerHTML = 'Ample Pharma Agency';
    shopNameCell.style.backgroundColor = 'lightblue';
    // Create table header
    var headerRow = billTable.insertRow(1);

    // Add a cell for the shop name (ABC)

    // Add a cell for the doctor name in the second row with colspan
    var doctorNameCell = headerRow.insertCell();
    doctorNameCell.colSpan = numColumns - 1; // Adjust the colspan
    doctorNameCell.innerHTML = 'TO : ' + selectedCards[0].doctorName; // Assuming all selected cards have the same doctor name

    // Add cells for other headers in the third row
    var detailsHeaderRow = billTable.insertRow(2);
    var detailsHeaders = ['Medicine Name', 'Quantity', 'Price', 'GST', 'SGST', 'Total Price'];
    detailsHeaders.forEach(function (header) {
        var cell = detailsHeaderRow.insertCell();
        cell.innerHTML = header;
    });

    var totalColumn = [0, 0, 0, 0, 0, 0]; // Array to store column totals

    // Add data rows
    selectedCards.forEach(function (selectedCard) {
        var row = billTable.insertRow();
    var cells = [
        selectedCard.medicineName,
        selectedCard.quantity,
        selectedCard.price.toFixed(2), // Display the price with two decimal places
    ];

    var GST_RATE = 18;
    // Calculate GST, SGST, and Total Price
    var totalPrice = selectedCard.quantity * selectedCard.price;
    var gst = (totalPrice * GST_RATE) / 100;
    var sgst = gst; // Assuming SGST is the same as GST

    // Add GST, SGST, and Total Price to cells
    cells.push(gst.toFixed(2));
    cells.push(sgst.toFixed(2));
    cells.push((totalPrice + gst + sgst).toFixed(2)); // Correct total price calculation

    // Update column totals
    cells.forEach(function (value, index) {
        totalColumn[index] += parseFloat(value) || 0;
    });

    // Add cells to the row
    cells.forEach(function (cellValue) {
        var cell = row.insertCell();
        cell.innerHTML = cellValue;
    });
});
    // Add the total row at the bottom
    var totalRow = billTable.insertRow();
    totalColumn.forEach(function (total, index) {
        var cell = totalRow.insertCell();
        cell.innerHTML = index === 0 ? 'Total' : total.toFixed(2);
    });
}

function updateSelectionFeedback() {
    var selectedCount = document.querySelectorAll('.card.selected').length;
    console.log('Selected cards count:', selectedCount);
    // You can update any feedback elements or perform other actions based on the selected count
}


function printpage(){
    document.querySelector("h2").style.display = 'none';
    document.getElementById('download').style.display = 'none';
    document.getElementById('footer').style.display = 'none';
    document.getElementById('header').style.display = 'none';
    
window.print();


setTimeout(function () {
    document.getElementById('download').style.display = 'block';
}, 1000); // You can adjust the delay as needed

setTimeout(function () {
    document.getElementById('footer').style.display = 'block';
}, 1000); // You can adjust the delay as needed

setTimeout(function () {
    document.getElementById('header').style.display = 'block';
}, 1000); // You can adjust the delay as needed

setTimeout(function () {
    document.getElementById('h2').style.display = 'block';
}, 1000); // You can adjust the delay as needed


}
